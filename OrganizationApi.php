<?php
/**
 * HID FARGO Connect - Cloud Card Issuance Solution
 * Copyright (c) 2016-2020. eXtensia Technologies, All rights reserved
 */

namespace CardServices;

use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Uri;

include_once 'Organization.php';
include_once 'OrganizationalUnit.php';
include_once 'Location.php';

/**
 * Class used to submit Organization API requests the Card Services REST server.
 * The API methods serve as wrappers around the underlying REST API calls
 * and decode the server JSON responses into instances of the appropriate
 * class type.
 *
 * @package CardServices
 */
class OrganizationApi
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
     * Constructs and initializes the OrganizationApi with the specified HTTP
     * client instance, baseUri and options. This constructor is intended for
     * internal SDK use only.
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
     * Queries the server for the list of available Organizations. An empty list
     * is returned if no organizations are found.
     *
     * @return Organization[] List of Organization objects
     * @throws CardServicesClientException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function listOrganizations()
    {
        $request = new Request('GET', $this->baseUri->withPath('/api/1.0/organizations'));
        $response = $this->httpClient->send($request, $this->options)->getBody()->getContents();
        $decodedResponse = \GuzzleHttp\json_decode($response, true);
        $status = $decodedResponse["status"];

        if ($status === "success") {
            $organizations = array();
            foreach ($decodedResponse["data"] as $organizationData) {
                array_push($organizations, new Organization($organizationData));
            }
        } else {
            throw new CardServicesClientException('Error getting organization list');
        }
        return $organizations;
    }

    /**
     * Queries the server for the Organization matching the specified unique Id. A
     * CardServicesApiException is thrown if the specified organization is not found.
     *
     * @param string $origId Organization unique Id
     * @return Organization The requested organization
     * @throws CardServicesClientException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getOrganization($origId)
    {
        $request = new Request('GET', $this->baseUri->withPath('/api/1.0/organizations/' . $origId));
        $response = $this->httpClient->send($request, $this->options)->getBody()->getContents();
        $decodedResponse = \GuzzleHttp\json_decode($response, true);
        $status = $decodedResponse["status"];

        if ($status === "success") {
            $organization = new Organization($decodedResponse["data"]);
        } else {
            throw new CardServicesClientException('Error getting organization for orgId: ' . $origId);
        }
        return $organization;
    }

    /**
     * Queries the server for the list of available OrganizationalUnits for the
     * organization with the specified unique Id. An empty list is returned
     * if no organizational units are found for the organization.
     *
     * @param string $orgId Organization unique Id
     * @return OrganizationalUnit[] List of organizational units
     * @throws CardServicesClientException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function listOrganizationalUnits($orgId)
    {
        $request = new Request('GET', $this->baseUri->withPath('/api/1.0/organizations/' . $orgId . '/organizationalunits'));
        $response = $this->httpClient->send($request, $this->options)->getBody()->getContents();
        $decodedResponse = \GuzzleHttp\json_decode($response, true);
        $status = $decodedResponse["status"];

        if ($status === "success") {
            $organizationUnits = array();
            foreach ($decodedResponse["data"] as $organizationUnitData) {
                array_push($organizationUnits, new OrganizationalUnit($organizationUnitData));
            }
        } else {
            throw new CardServicesClientException("Error getting organizational units for orgId: " . $orgId);
        }
        return $organizationUnits;
    }

    /**
     * Queries the server for the OrganizationalUnit matching the specified organizational
     * unit unique Id. A CardServicesApiException is thrown if the specified organizational
     * unit is not found.
     *
     * @param string $orgUnitId Organizational unit unique Id
     * @return OrganizationalUnit Requested organizational unit
     * @throws CardServicesClientException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getOrganizationalUnit($orgUnitId)
    {
        $request = new Request('GET', $this->baseUri->withPath('/api/1.0/organizations/organizationalunits/' . $orgUnitId));
        $response = $this->httpClient->send($request, $this->options)->getBody()->getContents();
        $decodedResponse = \GuzzleHttp\json_decode($response, true);
        $status = $decodedResponse["status"];

        if ($status === "success") {
            $organizationalUnit = new OrganizationalUnit($decodedResponse["data"]);
        } else {
            throw new CardServicesClientException("Error getting organizational unit for orgUnitId: " . $orgUnitId);
        }
        return $organizationalUnit;
    }

    /**
     * Queries the server for the list of available Locations across all organizational
     * units belonging to the organization with specified unique Id. An empty list is
     * returned if no locations are found for the organization.
     *
     * @param string $orgId Organization unique Id
     * @return Location[] List of locations for the organization
     * @throws CardServicesClientException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function listOrganizationLocations($orgId)
    {
        $request = new Request('GET', $this->baseUri->withPath('/api/1.0/organizations/' . $orgId . '/locations'));
        $response = $this->httpClient->send($request, $this->options)->getBody()->getContents();
        $decodedResponse = \GuzzleHttp\json_decode($response, true);
        $status = $decodedResponse["status"];

        if ($status === "success") {
            $locations = array();
            foreach ($decodedResponse["data"] as $locationData) {
                array_push($locations, new Location($locationData));
            }
        } else {
            throw new CardServicesClientException("Error getting locations for orgId: " . $orgId);
        }
        return $locations;
    }

    /**
     * Queries the server for the list of available Locations entries across all
     * organizational units belonging to the organization with specified unique Id.
     * An empty list is returned if no locations are found for the organization.
     *
     * @param string $orgUnitId Organizational unit unique Id
     * @return Location[] List of locations for the organization
     * @throws CardServicesClientException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function listLocations($orgUnitId)
    {
        $request = new Request('GET', $this->baseUri->withPath('/api/1.0/organizations/organizationalunits/' . $orgUnitId . '/locations'));
        $response = $this->httpClient->send($request, $this->options)->getBody()->getContents();
        $decodedResponse = \GuzzleHttp\json_decode($response, true);
        $status = $decodedResponse["status"];

        if ($status === "success") {
            $locations = array();
            foreach ($decodedResponse["data"] as $locationData) {
                array_push($locations, new Location($locationData));
            }
        } else {
            throw new CardServicesClientException("Error getting locations for orgUnitId: " . $orgUnitId);
        }
        return $locations;
    }

    /**
     * Queries the server for the Location matching the specified location unique Id.
     * A CardServicesApiException is thrown if the specified location is not found.
     *
     * @param string $locationId Location unique Id
     * @return Location Requested location
     * @throws CardServicesClientException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getLocation($locationId)
    {
        $request = new Request('GET', $this->baseUri->withPath('/api/1.0/organizations/organizationalunits/locations/' . $locationId));
        $response = $this->httpClient->send($request, $this->options)->getBody()->getContents();
        $decodedResponse = \GuzzleHttp\json_decode($response, true);
        $status = $decodedResponse["status"];

        if ($status === "success") {
            $location = new Location($decodedResponse["data"]);
        } else {
            throw new CardServicesClientException("Error getting location for locationId: " . $locationId);
        }
        return $location;
    }
}