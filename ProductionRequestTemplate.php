<?php
/**
 * HID FARGO Connect - Cloud Card Issuance Solution
 * Copyright (c) 2016-2020. eXtensia Technologies, All rights reserved
 */

namespace CardServices;

use phpseclib\Crypt\RSA;
use XMLWriter;
use ZipArchive;

include_once 'CardRequestService.php';
include_once 'ProductionRequest.php';

/**
 * Class containing a production request template for assembling a
 * server production request.
 *
 * @package CardServices
 */
class ProductionRequestTemplate
{
    /**
     * Organization unique Id
     * @var string
     */
    private $organizationId;

    /**
     * Destination for the production request
     * @var string
     */
    private $destination;

    /**
     * Device API required for request assembly
     * @var DeviceApi
     */
    private $deviceApi;

    /**
     * Array of service objects contained in the template
     * @var CardRequestService[]
     */
    private $services;


    /**
     * Constructs and initializes the request template using the specified
     * json response data returned by the server.
     *
     * @param array $data Server response data
     * @param DeviceApi Client device API
     */
    function __construct($data, $deviceApi)
    {
        $this->organizationId = $data["organizationId"];
        $this->destination = $data["destination"];
        $this->services = array();
        $this->deviceApi = $deviceApi;

        foreach ($data["services"] as $service) {
            array_push($this->services, new CardRequestService($service));
        }
    }

    /**
     * Get the Production Request Template's organization id
     * @return string
     */
    public function getOrganizationId()
    {
        return $this->organizationId;
    }

    /**
     * Set the Production Request Template's organization Id
     * @param string $organizationId
     */
    public function setOrganizationId($organizationId)
    {
        $this->organizationId = $organizationId;
    }

    /**
     * Get the Production Request Template's destination
     * @return string
     */
    public function getDestination()
    {
        return $this->destination;
    }

    /**
     * Set the Production Request Template's destination
     * @param string $destination
     */
    public function setDestination($destination)
    {
        $this->destination = $destination;
    }

    /**
     * Get the Production Request Template's services
     * @return CardRequestService[]
     */
    public function getServices()
    {
        return $this->services;
    }

    /**
     * Set the Production Request Template's services
     * @param CardRequestService[] $services
     */
    public function setServices($services)
    {
        $this->services = $services;
    }

    /**
     * Creates and returns a production request object from this request template.
     *
     * @return ProductionRequest Production request
     * @throws CardServicesClientException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function buildRequest()
    {
        $zipFile = tempnam(sys_get_temp_dir(), 'hfc$temp');
        $zipArchive = new ZipArchive;
        $zipArchive->open($zipFile, ZipArchive::OVERWRITE);
        $serviceNumber = 1;

        foreach ($this->services as $service) {
            $destKeyCert = $this->deviceApi->getDestinationPublicKey($service->getDestination());
            $destKey = $destKeyCert->getCertificate();
            $this->assembleService($service, $serviceNumber, $zipArchive, $destKey);
            $serviceNumber++;
        }

        $zipArchive->close();
        return new ProductionRequest($zipFile);
    }

    /**
     * Assembles and adds service to to the request archive using the supplied
     * parameters.
     *
     * @param CardRequestService $service CardRequestService instance
     * @param int $serviceNumber CardRequestService sequence number
     * @param ZipArchive $zipArchive Destination zip archive
     * @param string $destinationKey Destination device public key
     */
    private function assembleService(CardRequestService $service, $serviceNumber, ZipArchive $zipArchive, $destinationKey)
    {
        $oXMLWriter = new XMLWriter;
        $oXMLWriter->openMemory();
        $oXMLWriter->setIndent(true);
        $oXMLWriter->startDocument('1.0', 'UTF-8');
        $oXMLWriter->startElement('service');

        $oXMLWriter->writeElement('name', $service->getName());
        $oXMLWriter->writeElement('description', $service->getDescription());
        $oXMLWriter->writeElement('type', $service->getType());
        $oXMLWriter->writeElement('version', "1.0");
        $oXMLWriter->writeElement('templateName', $service->getTemplateName());
        $oXMLWriter->writeElement('templateUniqueID', $service->getTemplateId());
        $oXMLWriter->writeElement('templateHash', $service->getVersion());
        $oXMLWriter->writeElement('destination', $service->getDestination());
        $oXMLWriter->writeElement('requestTimeLimit', $service->getRequestTimeLimit() ?: "-1");

        $oXMLWriter->startElement('displayParams');
        $oXMLWriter->startElement('displayParam');
        $oXMLWriter->writeAttribute('name', 'requestName');
        $oXMLWriter->writeAttribute('value', $service->getRequestName());
        $oXMLWriter->endElement();
        $oXMLWriter->startElement('displayParam');
        $oXMLWriter->writeAttribute('name', 'description');
        $oXMLWriter->writeAttribute('value', '');
        $oXMLWriter->endElement();
        $oXMLWriter->endElement();

        $oXMLWriter->startElement('serviceOptions');

        if (is_array($service->getServiceOptions())) {
            foreach ($service->getServiceOptions() as $optionName => $optionValue) {
                if (!empty($optionName)) {
                    $oXMLWriter->startElement('serviceOption');
                    $oXMLWriter->writeAttribute('name', $optionName);
                    $oXMLWriter->writeAttribute('value', $optionValue);
                    $oXMLWriter->endElement();
                }
            }
        }
        $oXMLWriter->endElement();

        $oXMLWriter->startElement('secureData');

        $oXMLWriter2 = new XMLWriter();
        $oXMLWriter2->openMemory();
        $oXMLWriter2->startDocument('1.0', 'UTF-8');
        $oXMLWriter2->startElement('requestParams');
        $pub_key = openssl_pkey_get_public($destinationKey);
        $publicKeyData = openssl_pkey_get_details($pub_key);

        $rsa = new RSA();
        $rsa->setEncryptionMode(RSA::ENCRYPTION_OAEP);
        $rsa->setHash('sha256');
        $rsa->setMGFHash('sha256');
        $rsa->loadKey($publicKeyData['key']);

        $optionName = openssl_random_pseudo_bytes(32);
        $enc_text = $rsa->encrypt($optionName);

        foreach ($service->getParameters() as $parameter) {
            $oXMLWriter2->startElement('requestParam');
            $oXMLWriter2->writeAttribute('name', $parameter->getName());
            $numPhotos = 1;
            if ($parameter->getDataType() == DataType::Image) {
                $ext = pathinfo($parameter->getValue(), PATHINFO_EXTENSION);
                $fhandle = fopen($parameter->getValue(), 'rb');
                $imageData = fread($fhandle, filesize($parameter->getValue()));
                $encImageData = openssl_encrypt($imageData, 'aes-256-ecb', $optionName, OPENSSL_RAW_DATA);
                $encImagePayload = base64_encode($enc_text) . base64_encode($encImageData);

                $photoName = 'image' . $numPhotos . '.' . $ext;
                $zipArchive->addFromString('services/service' . $serviceNumber . '/' . $photoName, $encImagePayload);
                $oXMLWriter2->writeAttribute('file', $photoName);
            } else {
                $oXMLWriter2->writeAttribute('value', $parameter->getValue());
            }
            $oXMLWriter2->endElement();
        }
        $oXMLWriter2->endElement();

        $encStr = $oXMLWriter2->outputMemory(true);
        $in = openssl_encrypt($encStr, "aes-256-ecb", $optionName, OPENSSL_RAW_DATA);
        // TODO Ensure base64 encrypted key always ends in "=="
        // TODO Implement support for ALG2 format(see C# and Java SDKs)
        $encryptedData = base64_encode($enc_text) . base64_encode($in);
        $oXMLWriter->writeRaw($encryptedData);
        $oXMLWriter->endElement();
        $oXMLWriter->endElement();
        $oXMLWriter->endDocument();
        $xmlDescriptor = $oXMLWriter->outputMemory(TRUE);
        $zipArchive->addFromString('services/service' . $serviceNumber . '/service.xml', $xmlDescriptor);
    }
}