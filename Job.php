<?php
/**
 * HID FARGO Connect - Cloud Card Issuance Solution
 * Copyright (c) 2016-2020. eXtensia Technologies, All rights reserved
 */

namespace CardServices;

use DateTime;
use Exception;

include_once('ServiceData.php');
include_once('JobResource.php');

/**
 * Class representing a Job in server responses
 *
 * @package CardServices
 */
class Job
{
    /**
     * Device unique identifier
     * @var string
     */
    private $deviceUniqueId;

    /**
     * Device location unique identifier
     * @var string
     */
    private $locationUniqueId;

    /**
     * Job unique identifier
     * @var string
     */
    private $jobUniqueId;

    /**
     * Job name
     * @var string
     */
    private $jobName;

    /**
     * Status code indicating the current job status
     * @var string
     */
    private $jobStatus;

    /**
     * Status message describing the jobStatus
     * @var string
     */
    private $jobStatusMessage;

    /**
     * Flag indicating job deletion has been requested
     * @var bool
     */
    private $jobDeletionRequested;

    /**
     * Message describing the reason for job deletion
     * @var string
     */
    private $jobDeletionMessage;

    /**
     * Results data for optional job services
     * @var ServiceData
     */
    private $serviceData;

    /**
     * Array of resources associated with the job
     * @var JobResource[]
     */
    private $jobResources;

    /**
     * Job submission date and time in UTC timezone.
     * @var \DateTime
     */
    private $submitDate;

    /**
     * Date and time the job was last updated in UTC timezone.
     * @var \DateTime
     */
    private $lastUpdate;


    /**
     * Constructs and initializes the job object using the specified json
     * response data returned by the server.
     *
     * @param array $data Server response data
     * @throws Exception
     */
    function __construct($data)
    {
        $this->deviceUniqueId = $data["deviceUniqueId"];
        $this->locationUniqueId = $data["locationUniqueId"];
        $this->jobUniqueId = $data["jobUniqueId"];
        $this->jobName = $data["jobName"];
        $this->jobStatus = $data["jobStatus"];
        $this->jobStatusMessage = $data["jobStatusMessage"];
        $this->jobDeletionRequested = $data["jobDeletionRequested"];
        $this->jobDeletionMessage = $data["jobDeletionMessage"];
        $this->serviceData = new ServiceData($data["serviceData"]);
        $this->submitDate = new DateTime($data["submitDate"]);
        $this->lastUpdate = new DateTime($data["lastUpdate"]);
        $this->jobResources = array();
        foreach ($data["jobResources"] as $jobResource) {
            array_push($this->jobResources, new JobResource($jobResource));
        }
    }

    /**
     * Returns the device unique identifier
     * @return string
     */
    public function getDeviceUniqueId()
    {
        return $this->deviceUniqueId;
    }

    /**
     * Sets the device unique identifier
     * @param string $deviceUniqueId
     */
    public function setDeviceUniqueId($deviceUniqueId)
    {
        $this->deviceUniqueId = $deviceUniqueId;
    }

    /**
     * Returns the device location unique identifier
     * @return string
     */
    public function getLocationUniqueId()
    {
        return $this->locationUniqueId;
    }

    /**
     * Sets the device location unique identifier
     * @param string $locationUniqueId
     */
    public function setLocationUniqueId($locationUniqueId)
    {
        $this->locationUniqueId = $locationUniqueId;
    }

    /**
     * Returns the job unique identifier
     * @return string
     */
    public function getJobUniqueId()
    {
        return $this->jobUniqueId;
    }

    /**
     * Sets the job unique identifier
     * @param string $jobUniqueId
     */
    public function setJobUniqueId($jobUniqueId)
    {
        $this->jobUniqueId = $jobUniqueId;
    }

    /**
     * Returns the job name
     * @return string
     */
    public function getJobName()
    {
        return $this->jobName;
    }

    /**
     * Sets the job name
     * @param string $jobName
     */
    public function setJobName($jobName)
    {
        $this->jobName = $jobName;
    }

    /**
     * Returns the status code indicating the current job status
     * @return string
     */
    public function getJobStatus()
    {
        return $this->jobStatus;
    }

    /**
     * Sets the status code indicating the current job status
     * @param string $jobStatus
     */
    public function setJobStatus($jobStatus)
    {
        $this->jobStatus = $jobStatus;
    }

    /**
     * Returns the status message describing the jobStatus
     * @return string
     */
    public function getJobStatusMessage()
    {
        return $this->jobStatusMessage;
    }

    /**
     * Sets the status message describing the jobStatus
     * @param string $jobStatusMessage
     */
    public function setJobStatusMessage($jobStatusMessage)
    {
        $this->jobStatusMessage = $jobStatusMessage;
    }

    /**
     * Returns the flag indicating job deletion has been requested
     * @return bool
     */
    public function getJobDeletionRequested()
    {
        return $this->jobDeletionRequested;
    }

    /**
     * Sets the flag indicating job deletion has been requested
     * @param bool $jobDeletionRequested
     */
    public function setJobDeletionRequested($jobDeletionRequested)
    {
        $this->jobDeletionRequested = $jobDeletionRequested;
    }

    /**
     * Returns the message describing the reason for job deletion
     * @return string
     */
    public function getJobDeletionMessage()
    {
        return $this->jobDeletionMessage;
    }

    /**
     * Sets the message describing the reason for job deletion
     * @param string $jobDeletionMessage
     */
    public function setJobDeletionMessage($jobDeletionMessage)
    {
        $this->jobDeletionMessage = $jobDeletionMessage;
    }

    /**
     * Returns the job card service result data
     * @return ServiceData
     */
    public function getServiceData()
    {
        return $this->serviceData;
    }

    /**
     * Sets the job card service result data
     * @param ServiceData $serviceData
     */
    public function setServiceData($serviceData)
    {
        $this->serviceData = $serviceData;
    }

    /**
     * Returns the array of resources associated with the job
     * @return JobResource[]
     */
    public function getJobResources()
    {
        return $this->jobResources;
    }

    /**
     * Sets the array of resources associated with the job
     * @param JobResource[] $jobResources
     */
    public function setJobResources($jobResources)
    {
        $this->jobResources = $jobResources;
    }

    /**
     * Returns the job submission date and time
     * @return \DateTime
     */
    public function getSubmitDate()
    {
        return $this->submitDate;
    }

    /**
     * Sets the job submission date and time
     * @param \DateTime $submitDate
     */
    public function setSubmitDate($submitDate)
    {
        $this->submitDate = $submitDate;
    }

    /**
     * Returns the job last update date and time
     * @return \DateTime
     */
    public function getLastUpdate()
    {
        return $this->lastUpdate;
    }

    /**
     * Sets the job last update date and time
     * @param \DateTime $lastUpdate
     */
    public function setLastUpdate($lastUpdate)
    {
        $this->lastUpdate = $lastUpdate;
    }
}