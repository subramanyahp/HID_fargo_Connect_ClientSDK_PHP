<?php
/**
 * HID FARGO Connect - Cloud Card Issuance Solution
 * Copyright (c) 2016-2020. eXtensia Technologies, All rights reserved
 */

namespace CardServices;

include_once "CardEdgeStatus.php";
include_once "PacsDecodeResults.php";

/**
 * Class containing the data returned by the Card Read Service for a card edge.
 * The enabled value indicates whether the card edge was enabled in the card
 * designer Card Read Service configuration. The status value indicates the
 * overall disposition of the card edge read results. Note that the same card
 * edge, as indicated by the edgeType value, may occur more than once for card
 * edge technologies that support multiple frame protocols.
 *
 * @package CardServices
 */
class CardEdgeData
{
    /**
     * Name of the card edge type. The supported card edge type names are
     * defined by constants in CardEdgeType.
     * @var string
     */
    private $edgeType;

    /**
     * Flag indicating whether the card edge was enabled in Card Read Service
     * configuration in the card template designer
     * @var boolean
     */
    private $enabled;

    /**
     * Card edge read status indicating indicating the outcome of the card edge
     * read operation succeeded. See CardEdgeStatus for the supported values.
     * @var string
     */
    private $status;

    /**
     * Status message describing the outcome of the card read edge read
     * @var string
     */
    private $statusMessage;

    /**
     * Name of the card protocol used to discover the card edge
     * @var string
     */
    private $cardProtocol;

    /**
     * Card serial number read, empty string if none
     * @var string
     */
    private $cardSerialNumber;

    /**
     * Flag indicating whether PACS data was read successfully for the card edge
     * @var boolean
     */
    private $pacsDataAvailable;

    /**
     * PACS data for the card edge in hex format, empty string if none
     * @var string
     */
    private $cardPacsBitData;

    /**
     * Width of the PACS data in bits, 0 if PACS data is unavailable
     * @var int
     */
    private $cardPacsBitCount;

    /**
     * Array containing decoded PACS data obtained by applying the
     * configured card formats to the CardPacsBitData field. Each
     * entry in the list corresponds to an individual card format.
     * @var PacsDecodeResults[]
     */
    private $pacsData;

    /**
     * Additional card edge read results in the form of key/value pairs
     * where applicable.
     * @var array
     */
    private $edgeData;


    /**
     * Constructs and initializes the card edge data object using the
     * specified json response data returned by the server.
     *
     * @param array $data Server response data
     */
    function __construct($data)
    {
        $this->edgeType = $data["edgeType"];
        $this->enabled = $data["enabled"];
        $this->status = $data["status"];
        $this->statusMessage = $data["statusMessage"];
        $this->cardProtocol = $data["cardProtocol"];
        $this->cardSerialNumber = $data["cardSerialNumber"];
        $this->pacsDataAvailable = $data["pacsDataAvailable"];
        $this->cardPacsBitData = $data["cardPacsBitData"];
        $this->cardPacsBitCount = (int)$data["cardPacsBitCount"];
        $this->pacsData=array();
        foreach ($data["pacsData"] as $pacsDecodeResult)
        {
            array_push($this->pacsData,new PacsDecodeResults($pacsDecodeResult));
        }
        $this->edgeData = $data["data"];
    }

    /**
     * Returns the card edge type
     * @return string
     */
    public function getEdgeType()
    {
        return $this->edgeType;
    }

    /**
     * Sets the card edge type
     * @param string $edgeType
     */
    public function setEdgeType($edgeType)
    {
        $this->edgeType = $edgeType;
    }

    /**
     * Returns the card edge enabled flag
     * @return bool
     */
    public function getEnabled()
    {
        return $this->enabled;
    }

    /**
     * Sets the card edge enabled flag
     * @param bool $enabled
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;
    }

    /**
     * Returns the card edge read status
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Sets the card edge read status
     * @param string $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * Returns the card edge read status message
     * @return string
     */
    public function getStatusMessage()
    {
        return $this->statusMessage;
    }

    /**
     * Sets the card edge read status message
     * @param string $statusMessage
     */
    public function setStatusMessage($statusMessage)
    {
        $this->statusMessage = $statusMessage;
    }

    /**
     * Returns the card edge frame protocol
     * @return string
     */
    public function getCardProtocol()
    {
        return $this->cardProtocol;
    }

    /**
     * Sets the card edge frame protocol
     * @param string $cardProtocol
     */
    public function setCardProtocol($cardProtocol)
    {
        $this->cardProtocol = $cardProtocol;
    }

    /**
     * Returns the card serial number, empty if none
     * @return string
     */
    public function getCardSerialNumber()
    {
        return $this->cardSerialNumber;
    }

    /**
     * Sets the card serial number
     * @param string $cardSerialNumber
     */
    public function setCardSerialNumber($cardSerialNumber)
    {
        $this->cardSerialNumber = $cardSerialNumber;
    }

    /**
     * Returns the PACS data availability indicator
     * @return bool
     */
    public function getPacsDataAvailable()
    {
        return $this->pacsDataAvailable;
    }

    /**
     * Sets the PACS data availability indicator
     * @param bool $pacsDataAvailable
     */
    public function setPacsDataAvailable($pacsDataAvailable)
    {
        $this->pacsDataAvailable = $pacsDataAvailable;
    }

    /**
     * Returns the PACS data as a hex string, empty if none
     * @return string
     */
    public function getCardPacsBitData()
    {
        return $this->cardPacsBitData;
    }

    /**
     * Sets the PACS data as a hex string
     * @param string $cardPacsBitData
     */
    public function setCardPacsBitData($cardPacsBitData)
    {
        $this->cardPacsBitData = $cardPacsBitData;
    }

    /**
     * Returns the PACS data width in bits, 0 if not PACS data was read
     * @return int
     */
    public function getCardPacsBitCount()
    {
        return $this->cardPacsBitCount;
    }

    /**
     * Sets the PACS data width in bits
     * @param int $cardPacsBitCount
     */
    public function setCardPacsBitCount($cardPacsBitCount)
    {
        $this->cardPacsBitCount = $cardPacsBitCount;
    }

    /**
     * Returns the decoded PACS data for the card edge
     * @return PacsDecodeResults[]
     */
    public function getPacsData()
    {
        return $this->pacsData;
    }

    /**
     * Sets the decoded PACS data for the card edge
     * @param PacsDecodeResults[] $pacsData
     */
    public function setPacsData($pacsData)
    {
        $this->pacsData = $pacsData;
    }

    /**
     * Returns the additional card edge results as key/value pairs
     * @return array
     */
    public function getEdgeData()
    {
        return $this->edgeData;
    }

    /**
     * Sets the additional card edge results as key/value pairs
     * @param array $edgeData
     */
    public function setEdgeData($edgeData)
    {
        $this->edgeData = $edgeData;
    }
}