<?php
/**
 * HID FARGO Connect - Cloud Card Issuance Solution
 * Copyright (c) 2016-2020. eXtensia Technologies, All rights reserved
 */

namespace CardServices;

use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Uri;

include_once 'Device.php';
include_once 'PrintDestination.php';
include_once 'PublicKeyCertificate.php';

/**
 * Server API class used to obtain information about the Consoles and
 * Card Printers configured in the FARGO Connect platform. The class
 * serves as a high-level wrapper around the underlying REST API calls
 * and decodes the server JSON responses into object instances of the
 * required types.
 *
 * @package CardServices
 */
class DeviceApi
{
    /**
     * HTTP client used to submit REST requests
     * @var \GuzzleHttp\Client
     */
    private $httpClient;

    /**
     * Base URI for server requests
     * @var Uri
     */
    private $baseUri;

    /**
     * Options array specifying HTTP client parameters
     * @var array
     */
    private $options;


    /**
     * Constructs and initializes the DeviceApi with the specified HTTP
     * client instance, baseUri and options. This constructor is intended
     * for internal SDK use only.
     *
     * @param \GuzzleHttp\Client $httpClient HTTP client instance
     * @param Uri $baseUri Base URI for server requests
     * @param array $options HTTP request options
     */
    function __construct(\GuzzleHttp\Client $httpClient, Uri $baseUri, $options)
    {
        $this->httpClient = $httpClient;
        $this->baseUri = $baseUri;
        $this->options = $options;
        $this->options['headers'] += ['Accept' => 'application/cardservices.api.v1.2+json'];
    }

    /**
     * Queries the server for the list of available Devices. An empty list is
     * returned if no devices are found.
     *
     * @return Device[] List of devices found
     * @throws CardServicesClientException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function listDevices()
    {
        $request = new Request('GET', $this->baseUri->withPath('/api/1.0/devices'));
        $response = $this->httpClient->send($request, $this->options)->getBody()->getContents();
        $decodedResponse = \GuzzleHttp\json_decode($response, true);
        $status = $decodedResponse["status"];

        if ($status === "success") {
            $devices = array();
            foreach ($decodedResponse["data"] as $deviceData) {
                array_push($devices, new Device($deviceData));
            }
        } else {
            throw new CardServicesClientException("Error getting device list");
        }
        return $devices;
    }

    /**
     * Queries the server for the list of available Devices for the specified
     * organization unique Id. An empty list is returned if no devices are found.
     *
     * @param string $orgId Organization unique id
     * @return Device[] List of matching devices found
     * @throws CardServicesClientException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function listDevicesForOrg($orgId)
    {
        $request = new Request('GET', $this->baseUri->withPath('/api/1.0/devices;orgId=' . $orgId));
        $response = $this->httpClient->send($request, $this->options)->getBody()->getContents();
        $decodedResponse = \GuzzleHttp\json_decode($response, true);
        $status = $decodedResponse["status"];

        if ($status === "success") {
            $devices = array();
            foreach ($decodedResponse["data"] as $deviceData) {
                array_push($devices, new Device($deviceData));
            }
        } else {
            throw new CardServicesClientException("Error getting device list for orgId: " . $orgId);
        }
        return $devices;
    }

    /**
     * Queries the server for the Device matching the specified device Id. The
     * device Id can be either the unique Id of a device or a valid print destination.
     * A CardServicesApiException with a HTTP status code of 404 is thrown if the
     * specified device is not found.
     *
     * @param string $deviceId Unique device Id or print destination
     * @return Device Details for the requested device
     * @throws CardServicesClientException if the device is not found
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getDevice($deviceId)
    {
        $request = new Request('GET', $this->baseUri->withPath('/api/1.0/devices/' . $deviceId));
        $response = $this->httpClient->send($request, $this->options)->getBody()->getContents();
        $decodedResponse = \GuzzleHttp\json_decode($response, true);
        $status = $decodedResponse["status"];

        if ($status === "success") {
            $device = new Device($decodedResponse["data"]);
        } else {
            throw new CardServicesClientException('Error getting get device for deviceId: ' . $deviceId);
        }
        return $device;
    }

    /**
     * Queries the server for the list of available print destinations. An
     * empty list is returned if no print destinations are found.
     *
     * @return PrintDestination[] List of PrintDestination objects
     * @throws CardServicesClientException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function listPrintDestinations()
    {
        $request = new Request('GET', $this->baseUri->withPath('/api/1.0/devices/print_destinations'));
        $response = $this->httpClient->send($request, $this->options)->getBody()->getContents();
        $decodedResponse = \GuzzleHttp\json_decode($response, true);
        $status = $decodedResponse["status"];

        if ($status === "success") {
            $printDestinations = array();
            foreach ($decodedResponse["data"] as $printDestinationData) {
                array_push($printDestinations, new PrintDestination($printDestinationData));
            }
        } else {
            throw new CardServicesClientException("Error getting print destinations list");
        }
        return $printDestinations;
    }

    /**
     * Queries the server for the list of available print destinations for the
     * specified organization unique Id. An empty list is returned if no print
     * destinations are found.
     *
     * @param string $orgId Organization unique identifier
     * @return PrintDestination[] List of PrintDestination objects
     * @throws CardServicesClientException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function listPrintDestinationsForOrg($orgId)
    {
        $request = new Request('GET', $this->baseUri->withPath('/api/1.0/devices/print_destinations;orgId=' . $orgId));
        $response = $this->httpClient->send($request, $this->options)->getBody()->getContents();
        $decodedResponse = \GuzzleHttp\json_decode($response, true);
        $status = $decodedResponse["status"];

        if ($status === "success") {
            $printDestinations = array();
            foreach ($decodedResponse["data"] as $printDestinationsOrgData) {
                array_push($printDestinations, new PrintDestination($printDestinationsOrgData));
            }
        } else {
            throw new CardServicesClientException("Error getting print destinations for orgId: " . $orgId);
        }
        return $printDestinations;
    }

    /**
     * Queries the server for the public key certificate matching the specified print
     * destination Id. The destination Id can be either the unique Id of a device or a
     * valid print destination. A CardServicesApiException with a http status code of
     * 404 is thrown if the requested destination is not found.
     *
     * @param string $destinationId Unique Id of the device or a valid print destination
     * @return PublicKeyCertificate Public key certificate for destination
     * @throws CardServicesClientException if the destination is not found
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getDestinationPublicKey($destinationId)
    {
        $request = new Request('GET', $this->baseUri->withPath('/api/1.0/security/destinations/'
            . $destinationId . '/cert/encryption'));
        $response = $this->httpClient->send($request, $this->options)->getBody()->getContents();
        $decodedResponse = \GuzzleHttp\json_decode($response, true);
        $status = $decodedResponse["status"];

        if ($status === "success") {
            $publicKeyCertificate = new PublicKeyCertificate($decodedResponse["data"]);
        } else {
            throw new CardServicesClientException('Error getting certificate for destination Id: ' . $destinationId);
        }
        return $publicKeyCertificate;
    }
}