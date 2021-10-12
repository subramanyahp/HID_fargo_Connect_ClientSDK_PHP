<?php
/**
 * HID FARGO Connect - Cloud Card Issuance Solution
 * Copyright (c) 2016-2020. eXtensia Technologies, All rights reserved
 */

namespace CardServices;

include_once 'BusinessAddress.php';
include_once 'ShippingAddress.php';

/**
 * Class representing a Location in server responses
 *
 * @package CardServices
 */
class Location
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
    private $organizationalUnitName;

    /**
     * Location unique identifier
     * @var string
     */
    private $locationId;

    /**
     * Location name
     * @var string
     */
    private $locationName;

    /**
     * Location business address
     * @var BusinessAddress
     */
    private $businessAddress;

    /**
     * Location shipping address
     * @var ShippingAddress
     */
    private $shippingAddress;


    /**
     * Constructs and initializes the location object using the specified
     * json response data returned by the server.
     *
     * @param array $data Server response data
     */
    function __construct($data)
    {
        $this->organizationId = $data["organizationId"];
        $this->organizationalUnitId = $data["organizationalUnitId"];
        $this->organizationalUnitName = $data["organizationalUnitName"];
        $this->locationId = $data["locationId"];
        $this->locationName = $data["locationName"];
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
     * Set the organization unique identifier
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
    public function getOrganizationalUnitName()
    {
        return $this->organizationalUnitName;
    }

    /**
     * Sets the organization unit name
     * @param string $organizationalUnitName
     */
    public function setOrganizationalUnitName($organizationalUnitName)
    {
        $this->organizationalUnitName = $organizationalUnitName;
    }

    /**
     * Returns the location unique identifier
     * @return string
     */
    public function getLocationId()
    {
        return $this->locationId;
    }

    /**
     * Sets the location unique identifier
     * @param string $locationId
     */
    public function setLocationId($locationId)
    {
        $this->locationId = $locationId;
    }

    /**
     * Returns the location name
     * @return string
     */
    public function getLocationName()
    {
        return $this->locationName;
    }

    /**
     * Sets the location name
     * @param string $locationName
     */
    public function setLocationName($locationName)
    {
        $this->locationName = $locationName;
    }

    /**
     * Returns the location business address
     * @return BusinessAddress
     */
    public function getBusinessAddress()
    {
        return $this->businessAddress;
    }

    /**
     * Sets the location business address
     * @param BusinessAddress $businessAddress
     */
    public function setBusinessAddress($businessAddress)
    {
        $this->businessAddress = $businessAddress;
    }

    /**
     * Returns the location shipping address
     * @return ShippingAddress
     */
    public function getShippingAddress()
    {
        return $this->shippingAddress;
    }

    /**
     * Sets the location shipping address
     * @param ShippingAddress $shippingAddress
     */
    public function setShippingAddress($shippingAddress)
    {
        $this->shippingAddress = $shippingAddress;
    }
}