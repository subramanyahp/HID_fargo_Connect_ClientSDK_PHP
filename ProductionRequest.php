<?php
/**
 * HID FARGO Connect - Cloud Card Issuance Solution
 * Copyright (c) 2016-2020. eXtensia Technologies, All rights reserved
 */

namespace CardServices;


/**
 * Class containing a assembled job production request ready for submission
 * to the server for processing.
 *
 * @package CardServices
 */
class ProductionRequest
{
    /**
     * Temporary file containing the zip-compressed job data
     * @var object
     */
    private $requestFile;

    
    /**
     * Constructs and initializes the production request using the supplied file
     * containing the zip-compressed job data.
     *
     * @param $requestFile
     */
    public function __construct($requestFile)
    {
        $this->requestFile = $requestFile;
    }

    /**
     * Returns the file containing the zip compressed request data
     * @return object requestFile
     */
    public function getRequestFile()
    {
        return $this->requestFile;
    }
}