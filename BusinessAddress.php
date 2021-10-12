<?php
/**
 * HID FARGO Connect - Cloud Card Issuance Solution
 * Copyright (c) 2016-2020. eXtensia Technologies, All rights reserved
 */

namespace CardServices;

/**
 * Class representing a Business Address in server responses
 *
 * @package CardServices
 */
class BusinessAddress
{
    /**
     * Business contact name
     * @var string
     */
    private $contact;

    /**
     * Business contact phone number
     * @var string
     */
    private $phoneNo;

    /**
     * Business contact email address
     * @var string
     */
    private $email;

    /**
     * Business web site address
     * @var string
     */
    private $website;

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
     * Constructs and initializes the business address object using the
     * specified json response data returned by the server.
     *
     * @param array $data Server response data
     */
    function __construct($data)
    {
        $this->contact = $data["contact"];
        $this->phoneNo = $data["phoneNo"];
        $this->email = $data["email"];
        $this->website = $data["website"];
        $this->address1 = $data["address1"];
        $this->address2 = $data["address2"];
        $this->city = $data["city"];
        $this->state = $data["state"];
        $this->postalCode = $data["postalCode"];
        $this->countryCode = $data["countryCode"];
    }

    /**
     * Returns the business contact name
     * @return string
     */
    public function getContact()
    {
        return $this->contact;
    }

    /**
     * Sets the business contact name
     * @param string $contact
     */
    public function setContact($contact)
    {
        $this->contact = $contact;
    }

    /**
     * Returns the business contact phone number
     * @return string
     */
    public function getPhoneNo()
    {
        return $this->phoneNo;
    }

    /**
     * Sets the business contact phone number
     * @param string $phoneNo
     */
    public function setPhoneNo($phoneNo)
    {
        $this->phoneNo = $phoneNo;
    }

    /**
     * Returns the business contact email address
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Sets the business contact email address
     * @param $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * Returns the business web site address
     * @return string
     */
    public function getWebsite()
    {
        return $this->website;
    }

    /**
     * Sets the business web site address
     * @param $website
     */
    public function setWebsite($website)
    {
        $this->website = $website;
    }

    /**
     * Returns the first business address line
     * @return string
     */
    public function getAddress1()
    {
        return $this->address1;
    }

    /**
     * Sets the first business address line
     * @param string $address1
     */
    public function setAddress1($address1)
    {
        $this->address1 = $address1;
    }

    /**
     * Returns the second business address line
     * @return string
     */
    public function getAddress2()
    {
        return $this->address2;
    }

    /**
     * Sets the second business address line
     * @param string $address2
     */
    public function setAddress2($address2)
    {
        $this->address2 = $address2;
    }

    /**
     * Returns the business address city
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Sets the business address city
     * @param string $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * Returns the business address state name
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Sets the business address state name
     * @param string $state
     */
    public function setState($state)
    {
        $this->state = $state;
    }

    /**
     * Returns the business address postal code
     * @return string
     */
    public function getPostalCode()
    {
        return $this->postalCode;
    }

    /**
     * Sets the business address postal code
     * @param string $postalCode
     */
    public function setPostalCode($postalCode)
    {
        $this->postalCode = $postalCode;
    }

    /**
     * Returns the business address country code
     * @return string
     */
    public function getCountryCode()
    {
        return $this->countryCode;
    }

    /**
     * Sets the the business address country code
     * @param string $countryCode
     */
    public function setCountryCode($countryCode)
    {
        $this->countryCode = $countryCode;
    }
}