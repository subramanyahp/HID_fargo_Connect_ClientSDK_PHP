<?php
/**
 * HID FARGO Connect - Cloud Card Issuance Solution
 * Copyright (c) 2016-2020. eXtensia Technologies, All rights reserved
 */

namespace CardServices;

/**
 * Class representing a Billing Address in server responses
 *
 * @package CardServices
 */
class BillingAddress
{
    /**
     * Billing contact name
     * @var string
     */
    private $contact;

    /**
     * Billing contact phone number
     * @var string
     */
    private $phoneNo;

    /**
     * Address name
     * @var string
     */
    private $name;

    /**
     * Address line 1
     * @var string
     */
    private $address1;

    /**
     * Address line 2
     * @var string
     */
    private $address2;

    /**
     * City name
     * @var string
     */
    private $city;

    /**
     * State name
     * @var string
     */
    private $state;

    /**
     * Postal code
     * @var string
     */
    private $postalCode;

    /**
     * Country code
     * @var string
     */
    private $countryCode;


    /**
     * Constructs and initializes the billing address object using the
     * specified json response data returned by the server.
     *
     * @param array $data Server response data
     */
    function __construct($data)
    {
        $this->contact = $data["contact"];
        $this->phoneNo = $data["phoneNo"];
        $this->name = $data["name"];
        $this->address1 = $data["address1"];
        $this->address2 = $data["address2"];
        $this->city = $data["city"];
        $this->state = $data["state"];
        $this->postalCode = $data["postalCode"];
        $this->countryCode = $data["countryCode"];
    }

    /**
     * Returns the billing contact name
     * @return string
     */
    public function getContact()
    {
        return $this->contact;
    }

    /**
     * Sets the billing contact name
     * @param string $contact
     */
    public function setContact($contact)
    {
        $this->contact = $contact;
    }

    /**
     * Returns the billing contact phone number
     * @return string
     */
    public function getPhoneNo()
    {
        return $this->phoneNo;
    }

    /**
     * Sets the billing contact phone number
     * @param string $phoneNo
     */
    public function setPhoneNo($phoneNo)
    {
        $this->phoneNo = $phoneNo;
    }

    /**
     * Returns the billing address name
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets the billing address name
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Returns the first billing address line
     * @return string
     */
    public function getAddress1()
    {
        return $this->address1;
    }

    /**
     * Sets the first billing address line
     * @param string $address1
     */
    public function setAddress1($address1)
    {
        $this->address1 = $address1;
    }

    /**
     * Returns the second billing address line
     * @return string
     */
    public function getAddress2()
    {
        return $this->address2;
    }

    /**
     * Sets the second billing address line
     * @param string $address2
     */
    public function setAddress2($address2)
    {
        $this->address2 = $address2;
    }

    /**
     * Returns the billing address city
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Sets the billing address city
     * @param string $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * Returns the billing address state name
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Sets the billing address state name
     * @param string $state
     */
    public function setState($state)
    {
        $this->state = $state;
    }

    /**
     * Returns the billing address postal code
     * @return string
     */
    public function getPostalCode()
    {
        return $this->postalCode;
    }

    /**
     * Sets the billing address postal code
     * @param string $postalCode
     */
    public function setPostalCode($postalCode)
    {
        $this->postalCode = $postalCode;
    }

    /**
     * Returns the billing address country code
     * @return string
     */
    public function getCountryCode()
    {
        return $this->countryCode;
    }

    /**
     * Sets the the billing address country code
     * @param string $countryCode
     */
    public function setCountryCode($countryCode)
    {
        $this->countryCode = $countryCode;
    }
}