<?php
/**
 * HID FARGO Connect - Cloud Card Issuance Solution
 * Copyright (c) 2016-2020. eXtensia Technologies, All rights reserved
 */

namespace CardServices;

include_once 'ProductionProfileParameter.php';


/**
 * Class used to manage the profile configuration parameters needed to
 * generate a production job template for a production profile.
 *
 * @package CardServices
 */
class ProductionProfileConfig
{
    /**
     * Production profile unique Id
     * @var string
     */
    private $profileId;

    /**
     * Production profile configuration parameters
     * @var ProductionProfileParameter[]
     */
    private $profileParameters;


    /**
     * Constructs and initializes the profile configuration object with
     * the specified profile Id and parameters array
     *
     * ProductionProfileConfiguration constructor.
     * @param string $profileId Production profile unique Id
     * @param array $profileParameters Production profile parameters
     */
    function __construct($profileId, $profileParameters)
    {
        $this->profileId = $profileId;
        $this->profileParameters = $profileParameters;
    }

    /**
     * Returns the production profile unique Id
     * @return string
     */
    public function getProfileId()
    {
        return $this->profileId;
    }

    /**
     * Returns the list of configuration parameters for the production profile
     * @return ProductionProfileParameter[]
     */
    public function getProfileParameters()
    {
        return $this->profileParameters;
    }
}