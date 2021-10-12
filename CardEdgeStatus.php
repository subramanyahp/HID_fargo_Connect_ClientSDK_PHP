<?php
/**
 * HID FARGO Connect - Cloud Card Issuance Solution
 * Copyright (c) 2016-2020. eXtensia Technologies, All rights reserved
 */

namespace CardServices;

/**
 * Constants for use with the CardEdgeData status property to indicate
 * the status of a card edge read operation.
 *
 * @package CardServices
 */
class CardEdgeStatus
{
    /**
     * Card edge is disabled
     */
    const Disabled = "Disabled";

    /**
     * Card edge read succeeded
     */
    const Success = "Success";

    /**
     * Card edge was not found
     */
    const NotFound = "NotFound";

    /**
     * Card edge read failed
     */
    const Failed = "Failed";
}