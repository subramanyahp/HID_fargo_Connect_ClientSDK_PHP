<?php
/**
 * HID FARGO Connect - Cloud Card Issuance Solution
 * Copyright (c) 2016-2020. eXtensia Technologies, All rights reserved
 */

namespace CardServices;

include_once 'BusinessAddress.php';
include_once 'BillingAddress.php';

/**
 * Class representing an Organization in server responses
 *
 * @package CardServices
 */
class Organization
{
    /**
     * Organization unique identifier
     * @var string
     */
    private $organizationId;

    /**
     * Organization name
     * @var string
     */
    private $name;

    /**
     * Organization account number
     * @var string
     */
    private $accountNo;

    /**
     * Primary business address
     * @var BusinessAddress
     */
    private $businessAddress;

    /**
     * Billing address
     * @var BillingAddress
     */
    private $billingAddress;


    /**
     * Constructs and initializes the organization object using the
     * specified json response data returned by the server.
     *
     * @param array $data Server response data
     */
    function __construct($data)
    {
        $this->organizationId = $data["organizationId"];
        $this->name = $data["name"];
        $this->accountNo = $data["accountNo"];
        $this->businessAddress = new BusinessAddress($data["businessAddress"]);
        $this->billingAddress = new BillingAddress($data["billingAddress"]);
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
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets the organization name
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Returns the organization account number
     * @return string
     */
    public function getAccountNo()
    {
        return $this->accountNo;
    }

    /**
     * Sets the organization account number
     * @param string $accountNo
     */
    public function setAccountNo($accountNo)
    {
        $this->accountNo = $accountNo;
    }

    /**
     * Returns the organization primary business address
     * @return BusinessAddress
     */
    public function getBusinessAddress()
    {
        return $this->businessAddress;
    }

    /**
     * Sets the organization primary business address
     * @param BusinessAddress $businessAddress
     */
    public function setBusinessAddress($businessAddress)
    {
        $this->businessAddress = $businessAddress;
    }

    /**
     * Returns the organization billing address
     * @return BillingAddress
     */
    public function getBillingAddress()
    {
        return $this->billingAddress;
    }

    /**
     * Sets the organization billing address
     * @param BillingAddress $billingAddress
     */
    public function setBillingAddress($billingAddress)
    {
        $this->billingAddress = $billingAddress;
    }
}