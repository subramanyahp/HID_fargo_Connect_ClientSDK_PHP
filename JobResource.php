<?php
/**
 * HID FARGO Connect - Cloud Card Issuance Solution
 * Copyright (c) 2016-2020. eXtensia Technologies, All rights reserved
 */

namespace CardServices;

/**
 * Class representing a Job Resource in the server responses
 *
 * @package CardServices
 */
class JobResource
{
    /**
     * Job resource type (e.g. CardRenderOption::ResourceTypeImage)
     * @var string
     */
    private $resourceType;

    /**
     * Job resource key (e.g. CardRenderOption::ResourceKeyCardFront,
     * CardRenderOption::ResourceKeyCardBack etc.)
     * @var string
     */
    private $resourceKey;

    /**
     * Resource content type per RFC 6838 (e.g. image/png, image/jpeg)
     * @var string
     */
    private $contentType;


    /**
     * Constructs and initializes the job object using the specified json
     * response data returned by the server.
     *
     * @param array $data Server response data
     */
    function __construct($data)
    {
        $this->resourceType = $data["resourceType"];
        $this->resourceKey = $data["resourceKey"];
        $this->contentType = $data["contentType"];
    }

    /**
     * Returns the job resource type (e.g. CardRenderOption::ResourceTypeImage)
     * @return string
     */
    public function getResourceType()
    {
        return $this->resourceType;
    }

    /**
     * Sets the job resource type (e.g. CardRenderOption::ResourceTypeImage)
     * @param string $resourceType Job resource type
     */
    public function setResourceType($resourceType)
    {
        $this->resourceType = $resourceType;
    }

    /**
     * Returns the job resource key (e.g. CardRenderOption::ResourceKeyCardFront,
     * CardRenderOption::ResourceKeyCardBack etc.)
     * @return string
     */
    public function getResourceKey()
    {
        return $this->resourceKey;
    }

    /**
     * Sets the job resource key (e.g. CardRenderOption::ResourceKeyCardFront,
     * CardRenderOption::ResourceKeyCardBack etc.)
     * @param string $resourceKey Job resource key
     */
    public function setResourceKey($resourceKey)
    {
        $this->resourceKey = $resourceKey;
    }

    /**
     * Returns the resource content type per RFC 6838 (e.g. image/png, image/jpeg)
     * @return string
     */
    public function getContentType()
    {
        return $this->contentType;
    }

    /**
     * Sets the the resource content type per RFC 6838 (e.g. image/png, image/jpeg)
     * @param string $contentType Resource content type
     */
    public function setContentType($contentType)
    {
        $this->contentType = $contentType;
    }
}
