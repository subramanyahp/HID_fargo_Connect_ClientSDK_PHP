<?php
/**
 * HID FARGO Connect - Cloud Card Issuance Solution
 * Copyright (c) 2016-2020. eXtensia Technologies, All rights reserved
 */

namespace CardServices;

include_once 'CardReadResults.php';

/**
 * Class containing the results for services performed during
 * card job processing.
 *
 * @package CardServices
 */
class ServiceData
{
    /**
     * Card Read Service results data
     * @var CardReadResults
     */
    private $cardReadResults;


    /**
     * Constructs and initializes the service data object using the specified json
     * response data returned by the server.
     *
     * @param array $data Server response data
     */
    function __construct($data)
    {
        $this->cardReadResults = new CardReadResults($data['cardReadResults']);
    }

    /**
     * Returns the Card Read Service results object
     * @return CardReadResults
     */
    public function getCardReadResults()
    {
        return $this->cardReadResults;
    }

    /**
     * Sets the Card Read Service results object
     * @param CardReadResults $cardReadResults
     */
    public function setCardReadResults($cardReadResults)
    {
        $this->cardReadResults = $cardReadResults;
    }
}