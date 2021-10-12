<?php
/**
 * HID FARGO Connect - Cloud Card Issuance Solution
 * Copyright (c) 2016-2020. eXtensia Technologies, All rights reserved
 */

namespace CardServices;


/**
 * Class containing constants for use with the addServiceParameter method
 * of the ProductionRequestTemplate to configure printer options.
 *
 * @package CardServices
 */
class PrinterOption
{
    /**
     * Service parameter used to configure the card printer input
     * hopper selection.
     */
    const InputHopperSelect = "Printer.InputHopper";

    /**
     * InputHopperSelect value to configure the printer to use the
     * first available input hopper. This is the default selection.
     */
    const UseFirstAvailable = "FirstAvailable";

    /**
     * InputHopperSelect value to configure the printer to use
     * input Hopper 1.
     */
    const UseHopper1 = "Hopper1";

    /**
     * InputHopperSelect value to configure the printer to use
     * input Hopper 2. This option has no effect if the printer
     * does not have a second input hopper.
     */
    const UseHopper2 = "Hopper2";

    /**
     * InputHopperSelect value to configure the printer to use the
     * printer exception card slot. This option has no effect if
     * the printer does not have an exception slot.
     */
    const UseExceptionFeed = "Exception";
}