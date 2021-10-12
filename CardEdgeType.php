<?php
/**
 * HID FARGO Connect - Cloud Card Issuance Solution
 * Copyright (c) 2016-2020. eXtensia Technologies, All rights reserved
 */

namespace CardServices;


/**
 * Card edge types supported by the Card Read Service
 *
 * @package CardServices
 */
class CardEdgeType
{
    /**
     * HID Prox
     */
    const HID_PROX = "HID_PROX";

    /**
     * HID iCLASS
     */
    const HID_ICLASS = "HID_ICLASS";

    /**
     * SEOS
     */
    const SEOS = "SEOS";

    /**
     * Mifare Classic
     */
    const MIFARE_CLASSIC = "MIFARE_CLASSIC";

    /**
     * Mifare Plus
     */
    const MIFARE_PLUS = "MIFARE_PLUS";

    /**
     * Mifare Desfire
     */
    const MIFARE_DESFIRE = "MIFARE_DESFIRE";
}