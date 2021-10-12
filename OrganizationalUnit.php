<?php
/**
 * HID FARGO Connect - Cloud Card Issuance Solution
 * Copyright (c) 2016-2020. eXtensia Technologies, All rights reserved
 */

namespace CardServices;

include_once 'BusinessAddress.php';
include_once 'ShippingAddress.php';

/**
 * Class representing an Organizational Unit in server responses
 *
 * @package CardServices
 */
class OrganizationalUnit
{
    /**
     * Organization unique identifier
     * @var string
     */
    private $organizationId;

    /**
     * Organizational unit unique identifier
     * @var string
     */
    private $organizationalUnitId;

    /**
     * Organizational unit name
     * @var string
     */
    private $name;

    /**
     * Organizational unit primary business address
     * @var BusinessAddress
     */
    private $businessAddress;

    /**
     * Organizational unit shipping address
     * @var ShippingAddress
     */
    private $shippingAddress;


    /**
     * Constructs and initializes the organizational unit object using the
     * specified json response data returned by the server.
     *
     * @param array $data Server response data
     */
    function __construct($data)
    {
        $this->organizationId = $data["organizationId"];
        $this->organizationalUnitId = $data["organizationUnitId"];
        $this->name = $data["name"];
        $this->businessAddress = new BusinessAddress($data["businessAddress"]);
        $this->shippingAddress = new ShippingAddress($data["shippingAddress"]);
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
     * Returns the organizational unit unique identifier
     * @return string
     */
    public function getOrganizationalUnitId()
    {
        return $this->organizationalUnitId;
    }

    /**
     * Sets the organizational unit unique identifier
     * @param string $organizationalUnitId
     */
    public function setOrganizationalUnitId($organizationalUnitId)
    {
        $this->organizationalUnitId = $organizationalUnitId;
    }

    /**
     * Returns the organizational unit name
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets the organizational unit name
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Returns the organizational unit primary business address
     * @return BusinessAddress
     */
    public function getBusinessAddress()
    {
        return $this->businessAddress;
    }

    /**
     * Sets the organizational unit primary business address
     * @param BusinessAddress $businessAddress
     */
    public function setBusinessAddress($businessAddress)
    {
        $this->businessAddress = $businessAddress;
    }

    /**
     * Returns the organizational unit shipping address
     * @return ShippingAddress
     */
    public function getShippingAddress()
    {
        return $this->shippingAddress;
    }

    /**
     * Sets the organizational unit shipping address
     * @param ShippingAddress $shippingAddress
     */
    public function setShippingAddress($shippingAddress)
    {
        $this->shippingAddress = $shippingAddress;
    }
}