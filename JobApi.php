<?php
/**
 * HID FARGO Connect - Cloud Card Issuance Solution
 * Copyright (c) 2016-2020. eXtensia Technologies, All rights reserved
 */

namespace CardServices;

use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Uri;

include_once 'Job.php';
include_once 'JobImageResource.php';

/**
 * Server API class used to submit and monitor card production requests.
 * The class submits requests to FARGO Connect Job API service and decodes
 * the server responses into instances of the appropriate class types.
 *
 * @package CardServices
 */
class JobApi
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
     * Options array specifying HTTP client parameters using API version 1.2
     * @var array
     */
    private $options_v1_2;

    /**
     * Options array specifying HTTP client parameters using API version 1.3
     * @var array
     */
    private $options_v1_3;


    /**
     * Constructs and initializes the JobApi with the specified HTTP client
     * instance, baseUri and options. This constructor is intended for
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
        $this->options_v1_2 = $options;
        $this->options_v1_3 = $options;
        $this->options_v1_2['headers'] += ['Accept' => 'application/cardservices.api.v1.2+json'];
        $this->options_v1_3['headers'] += ['Accept' => 'application/cardservices.api.v1.3+json'];
    }

    /**
     * Queries the server for the list of available Job entries with a submit
     * date within the specified time period. Results are returned for the time
     * interval from the current time minus the specified time span up to the
     * current time (e.g. '24 hours' returns jobs from the last 24 hours). The
     * maxResults parameter specifies the maximum number of results to return.
     * The valid range for maxResults is 0 to 10000 inclusive.
     *
     * @param int $maxResults Maximum results to return
     * @param string $timePeriod Time period (ISO duration) for the Job Query
     * @return Job[] List of matching jobs, empty if none found
     * @throws CardServicesClientException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function listJobsForTimePeriod($maxResults, $timePeriod)
    {
        /*
         * Convert the $timePeriod string to DateInterval
         */
        $timePeriod = \DateInterval::createFromDateString($timePeriod);

        /*
         * Consolidate years, months and days into hours
         */
        if ($timePeriod->y) {
            $timePeriod->m = $timePeriod->y * 12;
            $timePeriod->y = 0;
        }

        if ($timePeriod->m) {
            $timePeriod->d = $timePeriod->m * 30;
            $timePeriod->m = 0;
        }

        if ($timePeriod->d) {
            $timePeriod->h = $timePeriod->d * 24;
            $timePeriod->d = 0;
        }

        $request = new Request('GET', $this->baseUri->withPath('/api/1.0/jobs;maxResults='
            . $maxResults . ';dateRange=PT' . $timePeriod->format('%hH%iM%sS')));
        $response = $this->httpClient->send($request, $this->options_v1_3)->getBody()->getContents();
        $decodedResponse = \GuzzleHttp\json_decode($response, true);
        $status = $decodedResponse["status"];

        if ($status === "success") {
            $jobs = array();
            foreach ($decodedResponse["data"] as $jobData) {
                array_push($jobs, new Job($jobData));
            }
        } else {
            throw new CardServicesClientException("Error getting jobs for timer period");
        }
        return $jobs;
    }

    /**
     * Queries the server for a list of all Jobs with the submit date within the
     * specified date range. Results are returned where the job submit date is
     * greater than or equal to the start date and less than or equal to the end
     * date. Care must be taken when specifying the dates to avoid unexpected
     * results due to time zone differences. The server sends dates and times in
     * UTC and requires the client to provide accurate timezone information when
     * submitting requests. The valid range for maximum results is 0 to 10000
     * inclusive
     *
     * @param int $maxResults Maximum number of jobs to return
     * @param string $startingDate Starting date in the date range
     * @param string $endingDate Ending date in the date range
     * @return Job[] List of matching jobs, empty if none found
     * @throws CardServicesClientException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function listJobsForDateRange($maxResults, $startingDate, $endingDate)
    {
        $startDate = new \DateTime($startingDate);
        $endDate = new \DateTime($endingDate);
        $startDate = $startDate->format(DATE_ATOM);
        $endDate = $endDate->format(DATE_ATOM);
        $request = new Request('GET', $this->baseUri->withPath('/api/1.0/jobs;maxResults='
            . $maxResults . ';dateRange=' . $startDate . '%2F' . $endDate));
        $response = $this->httpClient->send($request, $this->options_v1_3)->getBody()->getContents();
        $decodedResponse = \GuzzleHttp\json_decode($response, true);
        $status = $decodedResponse["status"];

        if ($status === "success") {
            $jobs = array();
            foreach ($decodedResponse["data"] as $jobData) {
                array_push($jobs, new Job($jobData));
            }
        } else {
            throw new CardServicesClientException("Error getting job list for date range");
        }
        return $jobs;
    }

    /**
     * Retrieves the job details for the job with specified Unique Id.
     *
     * @param string $id Unique Id of the job to return
     * @return Job The Job with Unique Id: $id
     * @throws CardServicesClientException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getJob($id)
    {
        if (empty($id) || strlen($id) < 1) {
            throw new CardServicesClientException("Job Id parameter cannot be null or blank");
        }

        $request = new Request('GET', $this->baseUri->withPath('/api/1.0/jobs/' . $id));
        $response = $this->httpClient->send($request, $this->options_v1_3)->getBody()->getContents();
        $decodedResponse = \GuzzleHttp\json_decode($response, true);
        $status = $decodedResponse["status"];

        if ($status === "success") {
            $job = new Job($decodedResponse["data"]);
        } else {
            throw new CardServicesClientException("Error getting job matching job id: " . $id);
        }
        return $job;
    }

    /**
     * Retrieves the job image resource matching the specified job unique Id and
     * resource key.
     *
     * @param string $id Unique Id of the job
     * @param string $resourceKey Job image resource key
     * @return JobImageResource Job image resource
     * @throws CardServicesClientException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getJobImageResource($id, $resourceKey)
    {
        if (empty($id) || strlen($id) < 1) {
            throw new CardServicesClientException("Job Id parameter cannot be null or blank");
        }

        if (empty($resourceKey) || strlen($resourceKey) < 1) {
            throw new CardServicesClientException("Resource key parameter cannot be null or blank");
        }

        $request = new Request('GET', $this->baseUri->withPath('/api/1.0/jobs/' . $id . '/image/' . $resourceKey));
        $response = $this->httpClient->send($request, $this->options_v1_2)->getBody()->getContents();
        $decodedResponse = \GuzzleHttp\json_decode($response, true);
        $status = $decodedResponse["status"];

        if ($status === "success") {
            $jobImageResource = new JobImageResource($decodedResponse["data"]);
        } else {
            throw new CardServicesClientException("Error getting job image resource for job id: "
                . $id . " resourceKey: " . $resourceKey);
        }
        return $jobImageResource;
    }

    /**
     * Generates a Unique ID for a new job
     * @return string Unique Id
     * @throws CardServicesClientException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getNewUUID()
    {
        $request = new Request('GET', $this->baseUri->withPath('/api/1.0/jobs/uniqueid'));
        $response = $this->httpClient->send($request)->getBody()->getContents();
        $decodedResponse = \GuzzleHttp\json_decode($response, true);
        $status = $decodedResponse["status"];

        if ($status === "success") {
            $uuid = $decodedResponse["data"];
        } else {
            throw new CardServicesClientException("Error generating new UUID");
        }
        return $uuid;
    }

    /**
     * Submits a production job request to the server for processing
     *
     * @param ProductionRequestTemplate $requestTemplate Production request template
     * @return string Production job unique ID
     * @throws CardServicesClientException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function submitRequest(ProductionRequestTemplate $requestTemplate)
    {
        $productionRequest = $requestTemplate->buildRequest();

        $requestUri = $this->baseUri->withPath('/api/1.0/jobs/submit');
        $response = $this->httpClient->request('POST', $requestUri, array_merge($this->options_v1_2,
            ['multipart' => [
                'name' => [
                    'name' => 'requestData',
                    'contents' => fopen($productionRequest->getRequestFile(), 'r')
                ]
            ]
            ]))->getBody()->getContents();
        return $response;
    }
}