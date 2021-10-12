<?php
/**
 * HID FARGO Connect - Cloud Card Issuance Solution
 * Copyright (c) 2016-2020. eXtensia Technologies, All rights reserved
 */

namespace CardServices;

/**
 * Request security domain class
 *
 * @package CardServices
 */
class SecurityDomain
{
    /**
     *  Security domain id
     * @var string
     */
    private $domainId;

    /**
     * Encryption public key for the domain
     * @var string
     */
    private $encryptionKey;

    /**
     * Security domain type
     * @var string
     */
    private $domainType;

    /**
     * Destination for security domain
     * @var string
     */
    private $destination;


    /**
     * Constructs and initializes the security domain object using the
     * specified json response data returned by the server.
     *
     * @param array $data Server response data
     */
    function __construct($data)
    {
        $this->domainId = $data['domainId'];
        $this->encryptionKey = $data['encryptionKey'];
        $this->domainType = $data['domainType'];
        $this->destination = $data['destination'];
    }

    /**
     * Returns the security domain Id
     * @return string
     */
    public function getDomainId()
    {
        return $this->domainId;
    }

    /**
     * Set the security domain Id
     * @param string
     */
    public function setDomainId($domainId)
    {
        $this->domainId = $domainId;
    }

    /**
     * Returns the security domain encryption key
     * @return string
     */
    public function getEncryptionKey()
    {
        return $this->encryptionKey;
    }

    /**
     * Set the security domain encryption key
     * @param string
     */
    public function setEncryptionKey($encryptionKey)
    {
        $this->encryptionKey = $encryptionKey;
    }

    /**
     * Return the security domain type
     * @return string
     */
    public function getDomainType()
    {
        return $this->domainType;
    }

    /**
     * Set the security domain type
     * @param string
     */
    public function setDomainType($domainType)
    {
        $this->domainType = $domainType;
    }

    /**
     * Returns the security domain destination
     * @return string
     */
    public function getDestination()
    {
        return $this->destination;
    }

    /**
     * Set the security domain destination
     * @param string $destination
     */
    public function setDestination($destination)
    {
        $this->destination = $destination;
    }
}