<?php
/**
 * HID FARGO Connect - Cloud Card Issuance Solution
 * Copyright (c) 2016-2020. eXtensia Technologies, All rights reserved
 */

namespace CardServices;

/**
 * Class representing a Device in server responses
 *
 * @package CardServices
 */
class Device
{
    /**
     * Device unique identifier
     * @var string
     */
    private $deviceId;

    /**
     * Device location unique identifier
     * @var string
     */
    private $locationId;

    /**
     * Last reported device status
     * @var string
     */
    private $deviceStatus;

    /**
     * Device status error details
     * @var string
     */
    private $errorMessage;

    /**
     * Date and time of last status update
     * @var string
     */
    private $lastUpdate;

    /**
     * Device location name
     * @var string
     */
    private $locationName;

    /**
     * Device name
     * @var string
     */
    private $deviceName;

    /**
     * Device description
     * @var string
     */
    private $deviceDescription;

    /**
     * Code indicating the type of device
     * @var string
     */
    private $deviceType;

    /**
     * Device model number
     * @var string Model
     */
    private $deviceModel;

    /**
     * Device manufacturer name
     * @var string
     */
    private $deviceManufacturer;

    /**
     * Device serial number
     * @var string
     */
    private $deviceSerialNumber;


    /**
     * Constructs and initializes the device object using the specified
     * json response data returned by the server.
     *
     * @param array $data Server response data
     */
    function __construct($data)
    {
        $this->deviceId = $data["deviceUniqueId"];
        $this->locationId = $data["locationId"];
        $this->deviceStatus = $data["deviceStatus"];
        $this->errorMessage = $data["errorMessage"];
        $this->lastUpdate = $data["lastUpdate"];
        $this->locationName = $data["locationName"];
        $this->deviceName = $data["deviceName"];
        $this->deviceDescription = $data["deviceDescription"];
        $this->deviceType = $data["deviceType"];
        $this->deviceModel = $data["deviceModel"];
        $this->deviceManufacturer = $data["deviceManufacturer"];
        $this->deviceSerialNumber = $data["deviceSerialNumber"];

        if (is_null($this->errorMessage)) {
            $this->errorMessage = "";
        }
    }

    /**
     * Returns the unique device identifier
     * @return string
     */
    public function getDeviceId()
    {
        return $this->deviceId;
    }

    /**
     * Sets the unique device identifier
     * @param string $deviceId
     */
    public function setDeviceId($deviceId)
    {
        $this->deviceId = $deviceId;
    }

    /**
     * Returns the unique device location identifier
     * @return string
     */
    public function getLocationId()
    {
        return $this->locationId;
    }

    /**
     * Sets the unique device location identifier
     * @param string $locationId
     */
    public function setLocationId($locationId)
    {
        $this->locationId = $locationId;
    }

    /**
     * Returns the device status code
     * @return string
     */
    public function getDeviceStatus()
    {
        return $this->deviceStatus;
    }

    /**
     * Sets the device status code
     * @param string $deviceStatus
     */
    public function setDeviceStatus($deviceStatus)
    {
        $this->deviceStatus = $deviceStatus;
    }

    /**
     * Returns the device error message
     * @return string
     */
    public function getErrorMessage()
    {
        return $this->errorMessage;
    }

    /**
     * Sets the device error message
     * @param string $errorMessage
     */
    public function setErrorMessage($errorMessage)
    {
        $this->errorMessage = $errorMessage;
    }

    /**
     * Returns the date and time of the last status update
     * @return string
     */
    public function getLastUpdate()
    {
        return $this->lastUpdate;
    }

    /**
     * Sets the date and time of the last status update
     * @param string $lastUpdate
     */
    public function setLastUpdate($lastUpdate)
    {
        $this->lastUpdate = $lastUpdate;
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
     * Returns the device name
     * @return string
     */
    public function getDeviceName()
    {
        return $this->deviceName;
    }

    /**
     * Sets the the device name
     * @param string $deviceName
     */
    public function setDeviceName($deviceName)
    {
        $this->deviceName = $deviceName;
    }

    /**
     * Returns the device description
     * @return string
     */
    public function getDeviceDescription()
    {
        return $this->deviceDescription;
    }

    /**
     * Sets the device description
     * @param string $deviceDescription
     */
    public function setDeviceDescription($deviceDescription)
    {
        $this->deviceDescription = $deviceDescription;
    }

    /**
     * Returns the device type code
     * @return string
     */
    public function getDeviceType()
    {
        return $this->deviceType;
    }

    /**
     * Sets the device type code
     * @param string $deviceType
     */
    public function setDeviceType($deviceType)
    {
        $this->deviceType = $deviceType;
    }

    /**
     * Returns the device model number
     * @return string
     */
    public function getDeviceModel()
    {
        return $this->deviceModel;
    }

    /**
     * Sets the device model number
     * @param string $deviceModel
     */
    public function setDeviceModel($deviceModel)
    {
        $this->deviceModel = $deviceModel;
    }

    /**
     * Returns the device manufacturer name
     * @return string
     */
    public function getDeviceManufacturer()
    {
        return $this->deviceManufacturer;
    }

    /**
     * Sets the device manufacturer name
     * @param string $deviceManufacturer
     */
    public function setDeviceManufacturer($deviceManufacturer)
    {
        $this->deviceManufacturer = $deviceManufacturer;
    }

    /**
     * Returns the device serial number
     * @return string
     */
    public function getDeviceSerialNumber()
    {
        return $this->deviceSerialNumber;
    }

    /**
     * Sets the device serial number
     * @param string $deviceSerialNumber
     */
    public function setDeviceSerialNumber($deviceSerialNumber)
    {
        $this->deviceSerialNumber = $deviceSerialNumber;
    }
}