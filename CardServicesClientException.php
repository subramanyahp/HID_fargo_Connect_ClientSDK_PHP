<?php
/**
 * HID FARGO Connect - Cloud Card Issuance Solution
 * Copyright (c) 2016-2020. eXtensia Technologies, All rights reserved
 */

namespace CardServices;

/**
 * Custom exception class used to report SDK errors
 *
 * @package CardServices
 */
class CardServicesClientException extends \Exception
{
    /**
     * Constructs and initializes the exception with the supplied
     * parameter values.
     *
     * @param string $message Exception message
     * @param int $code Error code
     * @param \Exception|null $previous Previous exception
     */
    public function __construct($message, $code = 0, \Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    /**
     * Returns the error message along with its error code as a string.
     * @return string
     */
    public function __toString()
    {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }
}