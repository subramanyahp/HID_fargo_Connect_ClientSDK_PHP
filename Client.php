<?php
/**
 * HID FARGO Connect - Cloud Card Issuance Solution
 * Copyright (c) 2016-2020. eXtensia Technologies, All rights reserved
 */

namespace CardServices;

use GuzzleHttp\Psr7\Uri;

require 'vendor/autoload.php';

include_once 'CardServicesClientConfig.php';
include_once 'CardServicesClientException.php';
include_once 'OrganizationApi.php';
include_once 'ProductionProfileApi.php';
include_once 'JobApi.php';
include_once 'DeviceApi.php';

/**
 * Client class used to connect to the HID FARGO Connect Card Services REST
 * API. The class constructor accepts a configuration object that contains
 * the client configuration parameters. The client exposes a set of API
 * objects for submitting requests to the server REST API.
 *
 * @package CardServices
 */
class Client
{
    /**
     * @const Card Services Client SDK version
     */
    const SDK_VERSION = '1.5.0';

    /**
     * HTTP client instance used to submit server requests
     * @var \GuzzleHttp\Client
     */
    private $httpClient;

    /**
     * Server API object for working with Organizations, Organizational Units
     * and Locations.
     * @var OrganizationApi
     */
    private $organizationApi;

    /**
     * Server API object for querying and configuring Production Profiles.
     * @var ProductionProfileApi
     */
    private $productionProfileApi;

    /**
     * Server API object used to submit and monitor card print jobs
     * @var JobApi
     */
    private $jobApi;

    /**
     * Server the API object used to work with Device and Print Destinations
     * @var DeviceApi
     */
    private $deviceApi;

    /**
     * Data encryption and signing certificate file
     * @var String
     */
    private $dataCertFile;

    /**
     * Data encryption and signing certificate file password
     * @var string
     */
    private $dataCertPwd;


    /**
     * Constructs and initializes the SDK client with the specified client
     * configuration settings.
     *
     * @param CardServicesClientConfig $clientConfig Client configuration
     * @throws CardServicesClientException
     */
    function __construct($clientConfig)
    {
        /*
         * Validate the client configuration settings
         */
        if (is_null($clientConfig)) {
            throw new CardServicesClientException("Client configuration object is null");
        }

        if (empty($clientConfig->getApikey())) {
            throw new CardServicesClientException("API Key cannot be null or empty");
        }

        if (empty($clientConfig->getServerProtocol())) {
            throw new CardServicesClientException("Server protocol cannot be null or empty");
        }

        $protocol = $clientConfig->getServerProtocol();

        if ((strcasecmp($protocol, "https") != 0) && (strcasecmp($protocol, "http") != 0)) {
            throw new CardServicesClientException("Invalid server protocol, must be http or https : " . $protocol);
        }

        if (empty($clientConfig->getServerHost())) {
            throw new CardServicesClientException("Server Host Address cannot be null or empty");
        }

        if (empty($clientConfig->getServerPort())) {
            throw new CardServicesClientException("Server Port Number cannot be null or empty");
        }

        if (empty($clientConfig->getAuthCertFile())) {
            throw new CardServicesClientException("Authentication certificate file cannot be null or empty");
        }

        if (!file_exists($clientConfig->getAuthCertFile())) {
            throw new CardServicesClientException("Authentication certificate file not found: " . $clientConfig->getAuthCertFile());
        }

        if (is_null($clientConfig->getAuthCertPwd())) {
            throw new CardServicesClientException("Authentication certificate password cannot be null");
        }

        if (empty($clientConfig->getCaCertFile())) {
            throw new CardServicesClientException("CA trust chain file cannot be null or empty");
        }

        if (!file_exists($clientConfig->getCaCertFile())) {
            throw new CardServicesClientException("CA trust chain file not found: " . $clientConfig->getCaCertFile());
        }

        if (empty($clientConfig->getDataCertFile())) {
            throw new CardServicesClientException("Data certificate file cannot be null or empty");
        }

        if (!file_exists($clientConfig->getDataCertFile())) {
            throw new CardServicesClientException("Data certificate file not found: " . $clientConfig->getDataCertFile());
        }

        if (is_null($clientConfig->getDataCertPwd())) {
            throw new CardServicesClientException("Data Certificate Password cannot be null");
        }

        /*
         * Configure the http client
         */
        $this->httpClient = new \GuzzleHttp\Client();

        $options = [
            'headers' => [
                'HFC-Client-Api-Key' => $clientConfig->getApikey(),
                'HFC-Client-SDK-Name' => 'HFC Client SDK for PHP',
                'HFC-Client-SDK-Version' => self::getSdkVersion()
            ],
            'cert' => [$clientConfig->getAuthCertFile(), $clientConfig->getAuthCertPwd()],
            'verify' => $clientConfig->getCaCertFile()
        ];

        $baseUri = (new Uri())
            ->withScheme(strtolower($clientConfig->getServerProtocol()))
            ->withHost($clientConfig->getServerHost())
            ->withPort($clientConfig->getServerPort());

        /*
         * Creating the API end point objects
         */
        $this->deviceApi = new DeviceApi($this->httpClient, $baseUri, $options);
        $this->organizationApi = new OrganizationApi($this->httpClient, $baseUri, $options);
        $this->productionProfileApi = new ProductionProfileApi($this->httpClient, $baseUri, $options, $this->deviceApi);
        $this->jobApi = new JobApi($this->httpClient, $baseUri, $options);
        $this->dataCertFile = $clientConfig->getDataCertFile();
        $this->dataCertPwd = $clientConfig->getDataCertPwd();
    }

    /**
     * Returns the OrganizationApi object for working with Organizations,
     * Organizational Units and Locations
     * @return OrganizationApi
     */
    public function getOrganizationApi()
    {
        return $this->organizationApi;
    }

    /**
     * Returns the ProductionProfileApi object for querying and configuring
     * Production Profiles.
     * @return ProductionProfileApi
     */
    public function getProductionProfileApi()
    {
        return $this->productionProfileApi;
    }

    /**
     * Returns the JobApi object used to submit and monitor card print jobs
     * @return JobApi
     */
    public function getJobApi()
    {
        return $this->jobApi;
    }

    /**
     * Returns the DeviceApi object used to work with Device and Print Destinations
     * @return DeviceApi
     */
    public function getDeviceApi()
    {
        return $this->deviceApi;
    }

    /**
     * Returns the client SDK version
     * @return string
     */
    public static function getSdkVersion()
    {
        return Client::SDK_VERSION;
    }
}
