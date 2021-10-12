<?php
/**
 * HID FARGO Connect - Cloud Card Issuance Solution
 * Copyright (c) 2016-2020. eXtensia Technologies, All rights reserved
 */

namespace CardServices;

include_once "CardEdgeData.php";

/**
 * Class containing results data from the card read service. The data is provided
 * in the form of an array of CardEdgeData objects. Each object contains the
 * information collected for an individual card edge found by the Card Read Service
 * during the card printing process. Please note that multiple card edges may be
 * reported for a given card technology if the card responds to more than one frame
 * protocol (e.g. a MIFARE Classic card supporting ISO14443A and ISO14443A_3).
 *
 * @package CardServices
 */
class CardReadResults
{
    /**
     * Array containing the card edge results returned by the Card Read Service.
     * @var CardEdgeData[]
     */
    private $cardEdges;


    /**
     * Constructs and initializes the array of card edge data objects using the
     * specified json response data returned by the server.
     *
     * @param array $data Server response data
     */
    function __construct($data)
    {
        $this->cardEdges = array();

        foreach ($data["cardEdges"] as $cardEdgeData) {
            array_push($this->cardEdges, new CardEdgeData($cardEdgeData));
        }
    }

    /**
     * Returns the array card edges for the card read results
     *
     * @return CardEdgeData[] Card edge object array
     */
    public function getCardEdges()
    {
        return $this->cardEdges;
    }

    /**
     * Sets the array card edges for the card read results
     * @param CardEdgeData[] $cardEdges Card edge object array
     */
    public function setCardEdges($cardEdges)
    {
        $this->cardEdges = $cardEdges;
    }
}