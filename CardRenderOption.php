<?php
/**
 * HID FARGO Connect - Cloud Card Issuance Solution
 * Copyright (c) 2016-2020. eXtensia Technologies, All rights reserved
 */

namespace CardServices;


/**
 * Class defining constants for configuring card image rendering options in the
 * the serviceOptions field of CardRequestService in card production requests.
 * The card image rendering service generates and returns an image of the
 * information printed on the front and/or back of the printed card.
 *
 * @package CardServices
 */
class CardRenderOption
{
    /**
     * Service parameter used to enable card image rendering. Supported
     * values are "true" and "false". The default setting is "false".
     */
    const Enable = "CardRender.Enabled";

    /**
     * Service parameter used to specify the output mode when card image
     * rendering is enabled. Supported values are RenderAndPrint and
     * RenderOnly. The default setting is RenderAndPrint.
     */
    const OutputMode = "CardRender.OutputMode";

    /**
     * Service parameter used to configure the card sides to be rendered.
     * Supported values are FrontOnly, BackOnly and FrontAndBack.
     * The default setting is FrontOnly.
     */
    const CardSides = "CardRender.CardSides";

    /**
     * Service parameter used to control the orientation of the rendered
     * card image. Supported image rotation values are NoRotation, Clockwise90,
     * Clockwise180 and Clockwise270. The default setting is NoRotation.
     */
    const ImageRotation = "CardRender.ImageRotation";

    /**
     * Service parameter used to configure the image quality setting of the
     * rendering process. The value must be a valid floating point number
     * between "0.0" and "1.0". The default setting is "0.8".
     */
    const ImageQuality = "CardRender.ImageQuality";

    /**
     * OutputMode value that configures the service to render the card
     * image and print a physical card. The card image is returned once
     * the card printing process has completed.
     */
    const RenderAndPrint = "RenderAndPrint";

    /**
     * OutputMode value that configures the service to only render
     * the card image. The job completes with a status of "Printed",
     * but a physical card is not printed.
     */
    const RenderOnly = "RenderOnly";

    /**
     * CardSides value that configures the service to render the card front.
     */
    const FrontOnly = "FrontOnly";

    /**
     * CardSides value that configures the service to render the card back.
     */
    const BackOnly = "BackOnly";

    /**
     * CardSides value that configures the service to render the card front and back.
     */
    const FrontAndBack = "FrontAndBack";

    /**
     * ImageRotation value that disables rotation of the card image
     */
    const NoRotation = "None";

    /**
     * ImageRotation value that rotates the image clockwise 90 degrees
     */
    const Clockwise90 = "Clockwise90";

    /**
     * ImageRotation value that rotates the image clockwise 180 degrees
     */
    const Clockwise180 = "Clockwise180";

    /**
     * ImageRotation value that rotates the image clockwise 270 degrees
     */
    const Clockwise270 = "Clockwise270";

    /**
     * Resource type used for rendered card images
     */
    const ResourceTypeImage = "Image";

    /**
     * Resource key used to retrieve the rendered card front image
     */
    const ResourceKeyCardFront = "CardFrontImage";

    /**
     * Resource key used to retrieve the rendered card back image
     */
    const ResourceKeyCardBack = "CardBackImage";
}
