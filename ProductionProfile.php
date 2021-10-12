<?php
/**
 * HID FARGO Connect - Cloud Card Issuance Solution
 * Copyright (c) 2016-2020. eXtensia Technologies, All rights reserved
 */

namespace CardServices;

/**
 * Class representing a Production Profile in server responses
 *
 * @package CardServices
 */
class ProductionProfile
{
    /**
     * Production profile unique identifier
     * @var string
     */
    private $profileId;

    /**
     * Production profile name
     * @var string
     */
    private $name;

    /**
     * Production profile parent organization unique identifier
     * @var string
     */
    private $organizationId;

    /**
     * Production profile parent organization name
     * @var string
     */
    private $organizationName;


    /**
     * Constructs and initializes the production profile object using
     * the specified json response data returned by the server.
     *
     * @param array $data Server response data
     */
    function __construct($data)
    {
        $this->profileId = $data["profileId"];
        $this->name = $data["name"];
        $this->organizationId = $data["organizationId"];
        $this->organizationName = $data["organizationName"];
    }

    /**
     * Returns the production profile unique identifier
     * @return string
     */
    public function getProfileId()
    {
        return $this->profileId;
    }

    /**
     * Sets the production profile unique identifier
     * @param string $profileId
     */
    public function setProfileId($profileId)
    {
        $this->profileId = $profileId;
    }

    /**
     * Returns the production profile name
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets the production profile name
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Returns the organization unique identifier
     * @return string
     */
    public function getOrganizationId()
    {
        return $this->organizationId;
    }

    /**
     * Sets the organization unique identifier
     * @param string $organizationId
     */
    public function setOrganizationId($organizationId)
    {
        $this->organizationId = $organizationId;
    }

    /**
     * Returns the organization name
     * @return string
     */
    public function getOrganizationName()
    {
        return $this->organizationName;
    }

    /**
     * Sets the organization name
     * @param string $organizationName
     */
    public function setOrganizationName($organizationName)
    {
        $this->organizationName = $organizationName;
    }
}