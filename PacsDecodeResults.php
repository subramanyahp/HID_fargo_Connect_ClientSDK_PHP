<?php
/**
 * HID FARGO Connect - Cloud Card Issuance Solution
 * Copyright (c) 2016-2020. eXtensia Technologies, All rights reserved
 */

namespace CardServices;

/**
 * Class containing PACS data obtained by decoding the card PACS
 * bits using a configured card format.
 *
 * @package CardServices
 */
class PacsDecodeResults
{
    /**
     * Name of the card format used to decode the PACS bits
     * @var string
     */
    private $formatName;

    /**
     * Card format PACS bit count, 0 if unknown
     * @var int
     */
    private $formatBitCount;

    /**
     * PACS decode status indicating the outcome of the PACS decode
     * process. The PacsDecodeStatus class defines constants for the
     * supported status values.
     * @var string
     */
    private $decodeStatus;

    /**
     * Message describing the outcome of the PACS decode process
     * @var string
     */
    private $statusMessage;

    /**
     * Card number extracted from the card PACS bits. The card number is a
     * mandatory field and is always present if the PACS decode process is
     * successful. The card number is also present in the pacsFields array.
     * @var string
     */
    private $cardNumber;

    /**
     * Associative array containing the PACS data fields in the form of
     * key/value pairs. The available fields and their names are controlled
     * by the card format and may vary across card formats.
     * @var array
     */
    private $pacsFields;


    /**
     * Constructs and initializes the PACS decode results using the
     * specified json response data returned by the server.
     *
     * @param array $data Server response data
     */
    function __construct($data)
    {
        $this->formatName = $data["formatName"];
        $this->formatBitCount = (int)$data["formatBitCount"];
        $this->decodeStatus = $data["decodeStatus"];
        $this->statusMessage = $data["statusMessage"];
        $this->cardNumber = $data["cardNumber"];
        $this->pacsFields = $data["pacsFields"];
    }

    /**
     * Returns the card format name
     * @return string Card format name
     */
    public function getFormatName()
    {
        return $this->formatName;
    }

    /**
     * Sets the card format name
     * @param string $formatName Card format name
     */
    public function setFormatName($formatName)
    {
        $this->formatName = $formatName;
    }

    /**
     * Returns the Card format PACS bit count, 0 if unknown
     * @return int Format bit count
     */
    public function getFormatBitCount()
    {
        return $this->formatBitCount;
    }

    /**
     * Sets the Card format PACS bit count, 0 if unknown
     * @param int $formatBitCount Format bit count
     */
    public function setFormatBitCount($formatBitCount)
    {
        $this->formatBitCount = $formatBitCount;
    }

    /**
     * Returns the PACS decode status code
     * @return string PACS decode status code
     */
    public function getDecodeStatus()
    {
        return $this->decodeStatus;
    }

    /**
     * Sets the PACS decode status code
     * @param string $decodeStatus PACS decode status code
     */
    public function setDecodeStatus($decodeStatus)
    {
        $this->decodeStatus = $decodeStatus;
    }

    /**
     * Returns the PACS decode status message
     * @return string Status message
     */
    public function getStatusMessage()
    {
        return $this->statusMessage;
    }

    /**
     * Sets the PACS decode status message
     * @param string $statusMessage Status message
     */
    public function setStatusMessage($statusMessage)
    {
        $this->statusMessage = $statusMessage;
    }

    /**
     * Returns the card number extracted from the card PACS bits.
     * @return string Card number
     */
    public function getCardNumber()
    {
        return $this->cardNumber;
    }

    /**
     * Sets the card number extracted from the card PACS bits.
     * @param string $cardNumber Card number
     */
    public function setCardNumber($cardNumber)
    {
        $this->cardNumber = $cardNumber;
    }

    /**
     * Returns the PACS data fields as key/value pairs
     * @return array
     */
    public function getPacsFields()
    {
        return $this->pacsFields;
    }

    /**
     * Sets the PACS data fields as key/value pairs
     * @param array $pacsFields PACS data fields array
     */
    public function setPacsFields($pacsFields)
    {
        $this->pacsFields = $pacsFields;
    }
}