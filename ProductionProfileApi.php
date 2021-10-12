<?php
/**
 * HID FARGO Connect - Cloud Card Issuance Solution
 * Copyright (c) 2016-2020. eXtensia Technologies, All rights reserved
 */

namespace CardServices;

use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Uri;

include_once 'ProductionProfile.php';
include_once 'ProductionProfileConfig.php';
include_once 'ProductionProfileParameter.php';
include_once 'ProductionRequestTemplate.php';

/**
 * Class used to submit Production Profile  API requests the Card Services
 * REST server. The API methods serve as wrappers around the underlying
 * REST API calls and decode the server JSON responses into instances of the
 * appropriate class type.
 *
 * @package CardServices
 */
class ProductionProfileApi
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
     * Client DeviceApi needed query destination certificates
     * @var DeviceApi
     */
    private $deviceApi;


    /**
     * Constructs and initializes the production profile API with the specified
     * HTTP client instance, baseUri and options. This constructor is intended
     * for internal SDK use only.
     *
     * @param \GuzzleHttp\Client $httpClient HTTP client instance
     * @param Uri $baseUri Base URI for server requests
     * @param array $options HTTP request options
     * @param DeviceApi $deviceApi Client device API object
     */
    function __construct(\GuzzleHttp\Client $httpClient, Uri $baseUri, $options, $deviceApi)
    {
        $this->httpClient = $httpClient;
        $this->baseUri = $baseUri;
        $this->options = $options;
        $this->options['headers'] += ['Accept' => 'application/cardservices.api.v1.2+json'];
        $this->deviceApi = $deviceApi;
    }

    /**
     * Queries the server for the list of available ProductionProfiles. An empty list
     * is returned if no production profiles are found.
     *
     * @return ProductionProfile[] List of production profiles
     * @throws CardServicesClientException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function listProductionProfiles()
    {
        $request = new Request('GET', $this->baseUri->withPath('api/1.0/production_profiles'));
        $response = $this->httpClient->send($request, $this->options)->getBody()->getContents();
        $decodedResponse = \GuzzleHttp\json_decode($response, true);
        $status = $decodedResponse["status"];

        if ($status === "success") {
            $productionProfiles = array();
            foreach ($decodedResponse["data"] as $productionProfileData) {
                array_push($productionProfiles, new ProductionProfile($productionProfileData));
            }
        } else {
            throw new CardServicesClientException("Error getting production profiles");
        }
        return $productionProfiles;
    }

    /**
     * Queries the server for the list of available ProductionProfiles for the specified
     * organization unique Id. An empty list is returned if no production profiles are found.
     *
     * @param string $orgId Organization unique Id
     * @return ProductionProfile[] List of production profiles
     * @throws CardServicesClientException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function listProductionProfilesForOrg($orgId)
    {
        $request = new Request('GET', $this->baseUri->withPath('api/1.0/production_profiles;orgId=' . $orgId));
        $response = $this->httpClient->send($request, $this->options)->getBody()->getContents();
        $decodedResponse = \GuzzleHttp\json_decode($response, true);
        $status = $decodedResponse["status"];

        if ($status === "success") {
            $productionProfiles = array();
            foreach ($decodedResponse["data"] as $productionProfileData) {
                array_push($productionProfiles, new ProductionProfile($productionProfileData));
            }
        } else {
            throw new CardServicesClientException("Error getting production profiles for orgId: " . $orgId);
        }
        return $productionProfiles;
    }

    /**
     * Queries the server for the production profile matching the specified profile unique Id.
     * A CardServicesApiException is thrown if the specified production profile is not found.
     *
     * @param string $profileId Production profile unique Id
     * @return ProductionProfile request production profile
     * @throws CardServicesClientException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function GetProductionProfile($profileId)
    {
        $request = new Request('GET', $this->baseUri->withPath('api/1.0/production_profiles/' . $profileId));
        $response = $this->httpClient->send($request, $this->options)->getBody()->getContents();
        $decodedResponse = \GuzzleHttp\json_decode($response, true);
        $status = $decodedResponse["status"];

        if ($status === "success") {
            $productionProfile = new ProductionProfile($decodedResponse["data"]);
        } else {
            throw new CardServicesClientException("Error getting production profile for profileId: " . $profileId);
        }
        return $productionProfile;
    }

    /**
     * Queries the server for the configuration parameters for the production profile matching the
     * specified profile unique Id. The method returns a ProductionProfileConfig object containing
     * the profile Id and profile configuration parameters needed to configure the production
     * profile. A CardServicesApiException is thrown if the specified production profile is
     * not found.
     *
     * @param string $profileId Production profile unique id
     * @return ProductionProfileConfig Production profile configuration object
     * @throws CardServicesClientException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getProductionProfileParams($profileId)
    {
        $request = new Request('GET', $this->baseUri->withPath('api/1.0/production_profiles/params/' . $profileId));
        $response = $this->httpClient->send($request, $this->options)->getBody()->getContents();
        $decodedResponse = \GuzzleHttp\json_decode($response, true);
        $status = $decodedResponse["status"];

        if ($status === "success") {
            $productionProfilesParams = array();

            foreach ($decodedResponse["data"] as $productionProfileParamData) {
                array_push($productionProfilesParams, new ProductionProfileParameter($productionProfileParamData));
            }
            $profileConfig = new ProductionProfileConfig($profileId, $productionProfilesParams);
        } else {
            throw new CardServicesClientException("Error getting production profile parameters for profileId: " . $profileId);
        }
        return $profileConfig;
    }

    /**
     * Configures the production profile with the specified configuration parameters
     * and returns a ProductionRequestTemplate needed to submit a production request.
     *
     * @param ProductionProfileConfig $profileConfig Production profile configuration
     * @return ProductionRequestTemplate Production request template
     * @throws CardServicesClientException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function configureProductionProfile(ProductionProfileConfig $profileConfig)
    {
        $configValues = array();

        foreach ($profileConfig->getProfileParameters() as $configParam) {
            $configValues[$configParam->getName()] = $configParam->getValue();
        }

        $requestUri = $this->baseUri->withPath('api/1.0/production_profiles/configure');
        $jsonConfiguration = json_encode($configValues);
        $response = $this->httpClient->request('POST', $requestUri, array_merge($this->options,
            ['multipart' => [
                ['name' => 'profileId', 'contents' => $profileConfig->getProfileId()],
                ['name' => 'config', 'contents' => $jsonConfiguration]
            ]]))->getBody()->getContents();

        $decodedResponse = \GuzzleHttp\json_decode($response, true);
        $status = $decodedResponse["status"];

        if ($status === "success") {
            $productionRequestTemplate = new ProductionRequestTemplate($decodedResponse["data"], $this->deviceApi);
        } else {
            throw new CardServicesClientException("Error configuring production profile template for profileId: "
                . $profileConfig->getProfileId());
        }
        return $productionRequestTemplate;
    }
}