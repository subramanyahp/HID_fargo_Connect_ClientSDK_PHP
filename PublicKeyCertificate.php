<?php
/**
 * HID FARGO Connect - Cloud Card Issuance Solution
 * Copyright (c) 2016-2020. eXtensia Technologies, All rights reserved
 */

namespace CardServices;

/**
 * Class used by the server to return a public key certificate.
 *
 * @package CardServices
 */
class PublicKeyCertificate
{
    /**
     * Certificate subject name
     * @var string
     */
    private $subject;

    /**
     * Certificate public key in Base64 format
     * @var string
     */
    private $certificate;

    /**
     * Array of supported data encryption algorithms
     * @var string[]
     */
    private $algorithms;


    /**
     * Constructs and initializes the certificate object using the specified
     * json response data returned by the server.
     *
     * @param array $data Server response data
     */
    function __construct($data)
    {
        $this->subject = $data["subject"];
        $this->certificate = $data["certificate"];
        $this->algorithms = $data["algorithms"];
    }

    /**
     * Returns the certificate subject name
     * @return string
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * Sets the certificate subject name
     * @param string $subject
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;
    }

    /**
     * Returns the certificate in Base64 format
     * @return string
     */
    public function getCertificate()
    {
        return $this->certificate;
    }

    /**
     * Sets the certificate in Base64 format
     * @param string $certificate
     */
    public function setCertificate($certificate)
    {
        $this->certificate = $certificate;
    }

    /**
     * Returns the supported encryption algorithms
     * @return string[]
     */
    public function getAlgorithms()
    {
        return $this->algorithms;
    }

    /**
     * Sets the supported encryption algorithms
     * @param string[] $algorithms
     */
    public function setAlgorithms($algorithms)
    {
        $this->algorithms = $algorithms;
    }
}