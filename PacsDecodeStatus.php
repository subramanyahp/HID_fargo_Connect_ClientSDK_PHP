<?php
/**
 * HID FARGO Connect - Cloud Card Issuance Solution
 * Copyright (c) 2016-2020. eXtensia Technologies, All rights reserved
 */

namespace CardServices;

/**
 * Constants for use with the decodeStatus property of the
 * PacsDecodeResults class to indicate the outcome of the
 * PACS bits decode process.
 *
 * @package CardServices
 */
class PacsDecodeStatus
{
    /**
     * PACS bits decoded successfully
     */
    const Success = "Success";

    /**
     * PACS bits decoded, but parity check failed
     */
    const ParityError = "ParityError";

    /**
     * PACS bits decode failed. See StatusMessage for details
     */
    const PacsDecodeFailed = "PacsDecodeFailed";

    /**
     * PACS format not found or inaccessible due to server
     * security constraints
     */
    const FormatNotFound = "FormatNotFound";

    /**
     * Error opening the PACS format
     */
    const FormatOpenFailed = "FormatOpenFailed";

    /**
     * PACS format and PACS bits are incompatible
     */
    const FormatMismatch = "FormatMismatch";
}