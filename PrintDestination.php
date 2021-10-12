<?php
/**
 * HID FARGO Connect - Cloud Card Issuance Solution
 * Copyright (c) 2016-2020. eXtensia Technologies, All rights reserved
 */

namespace CardServices;

/**
 * Class representing a Print Destination in server responses
 *
 * @package CardServices
 */
class PrintDestination
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
     * Location unique identifier
     * @var string
     */
    private $locationId;

    /**
     * Gateway device unique identifier
     * @var string
     */
    private $deviceId;

    /**
     * Organization name
     * @var string
     */
    private $organizationName;

    /**
     * Organizational unit name
     * @var string
     */
    private $organizationalUnitName;

    /**
     * Device location name
     * @var string
     */
    private $locationName;

    /**
     * Gateway device name
     * @var string
     */
    private $deviceName;

    /**
     * Card printer name
     * @var string
     */
    private $printerName;

    /**
     * Print destination comment
     * @var string
     */
    private $comment;

    /**
     * Print destination identifier
     * @var string
     */
    private $destination;


    /**
     * Constructs and initializes the print destination object using
     * the specified json response data returned by the server.
     *
     * @param array $data Server response data
     */
    function __construct($data)
    {
        $this->organizationId = $data["organizationId"];
        $this->organizationalUnitId = $data["organizationalUnitId"];
        $this->locationId = $data["locationId"];
        $this->deviceId = $data["deviceId"];
        $this->organizationName = $data["organizationName"];
        $this->organizationalUnitName = $data["organizationalUnitName"];
        $this->locationName = $data["locationName"];
        $this->deviceName = $data["deviceName"];
        $this->printerName = $data["printerName"];
        $this->comment = $data["comment"];
        $this->destination = $data["destination"];
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
     * Returns the device location unique identifier
     * @return string
     */
    public function getLocationId()
    {
        return $this->locationId;
    }

    /**
     * Sets the device location unique identifier
     * @param string $locationId
     */
    public function setLocationId($locationId)
    {
        $this->locationId = $locationId;
    }

    /**
     * Returns the device unique identifier
     * @return string
     */
    public function getDeviceId()
    {
        return $this->deviceId;
    }

    /**
     * Sets the device unique identifier
     * @param string $deviceId
     */
    public function setDeviceId($deviceId)
    {
        $this->deviceId = $deviceId;
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

    /**
     * Returns the organizational unit name
     * @return string
     */
    public function getOrganizationalUnitName()
    {
        return $this->organizationalUnitName;
    }

    /**
     * Sets the organizational unit name
     * @param string $organizationalUnitName
     */
    public function setOrganizationalUnitName($organizationalUnitName)
    {
        $this->organizationalUnitName = $organizationalUnitName;
    }

    /**
     * Returns the device location name
     * @return string
     */
    public function getLocationName()
    {
        return $this->locationName;
    }

    /**
     * Sets the device location name
     * @param string $locationName
     */
    public function setLocationName($locationName)
    {
        $this->locationName = $locationName;
    }

    /**
     * Returns the gateway device name
     * @return string
     */
    public function getDeviceName()
    {
        return $this->deviceName;
    }

    /**
     * Sets the gateway device name
     * @param string $deviceName
     */
    public function setDeviceName($deviceName)
    {
        $this->deviceName = $deviceName;
    }

    /**
     * Returns the card printer name
     * @return string
     */
    public function getPrinterName()
    {
        return $this->printerName;
    }

    /**
     * Sets the card printer name
     * @param string $printerName
     */
    public function setPrinterName($printerName)
    {
        $this->printerName = $printerName;
    }

    /**
     * Returns the print destination comment
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Sets the print destination comment
     * @param string $comment
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
    }

    /**
     * Returns the print destination identifier
     * @return string
     */
    public function getDestination()
    {
        return $this->destination;
    }

    /**
     * Sets the print destination identifier
     * @param string $destination
     */
    public function setDestination($destination)
    {
        $this->destination = $destination;
    }
}