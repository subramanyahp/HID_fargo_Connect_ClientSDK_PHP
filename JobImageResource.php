<?php
/**
 * HID FARGO Connect - Cloud Card Issuance Solution
 * Copyright (c) 2016-2020. eXtensia Technologies, All rights reserved
 */

namespace CardServices;

/**
 * Class representing a Job Image Resource in the server responses
 *
 * @package CardServices
 */
class JobImageResource
{
    /**
     * Job unique identifier
     * @var string
     */
    private $jobUniqueId;

    /**
     * Job image resource key
     * @var string
     */
    private $resourceKey;

    /**
     * Image data media type per RFC 6838 (e.g. image/png, image/jpeg)
     * @var string
     */
    private $imageType;

    /**
     * Image data encoded as a base64 string
     * @var string
     */
    private $imageData;


    /**
     * Constructs and initializes the job object using the specified json
     * response data returned by the server.
     *
     * @param array $data Server response data
     */
    function __construct($data)
    {
        $this->jobUniqueId = $data["jobUniqueId"];
        $this->resourceKey = $data["resourceKey"];
        $this->imageType = $data["imageType"];
        $this->imageData = $data["imageData"];
    }

    /**
     * Returns the Job unique Id
     * @return string
     */
    public function getJobUniqueId()
    {
        return $this->jobUniqueId;
    }

    /**
     * Sets the job unique Id
     * @param string $jobUniqueId Job unique Id
     */
    public function setJobUniqueId($jobUniqueId)
    {
        $this->jobUniqueId = $jobUniqueId;
    }

    /**
     * Returns the image resource key
     * @return string
     */
    public function getResourceKey()
    {
        return $this->resourceKey;
    }

    /**
     * Sets the image resource key
     * @param string $resourceKey Image resource key
     */
    public function setResourceKey($resourceKey)
    {
        $this->resourceKey = $resourceKey;
    }

    /**
     * Returns the image data media type per RFC 6838 (e.g. image/png, image/jpeg)
     * @return string
     */
    public function getImageType()
    {
        return $this->imageType;
    }

    /**
     * Sets the image data media type per RFC 6838 (e.g. image/png, image/jpeg)
     * @param string $imageType Image data media type
     */
    public function setImageType($imageType)
    {
        $this->imageType = $imageType;
    }

    /**
     * Returns the image data encoded as a base64 string
     * @return string
     */
    public function getImageData()
    {
        return $this->imageData;
    }

    /**
     * Sets the image data encoded as a base64 string
     * @param string $imageData Base64 image data
     */
    public function setImageData($imageData)
    {
        $this->imageData = $imageData;
    }
}
