<?php
/**
 * HID FARGO Connect - Cloud Card Issuance Solution
 * Copyright (c) 2016-2020. eXtensia Technologies, All rights reserved
 */

namespace CardServices;

include_once 'SecurityDomain.php';
include_once 'ServiceParameter.php';

/**
 * Service request type used to submit the data for a card
 * production request to the server.
 *
 * @package CardServices
 */
class CardRequestService
{
    /**
     * Service type name
     * @var string
     */
    private $type;

    /**
     * Service name
     * @var string
     */
    private $name;

    /**
     * Service description
     * @var string
     */
    private $description;

    /**
     * Card template id
     * @var string
     */
    private $templateId;

    /**
     * Card template name
     * @var string
     */
    private $templateName;

    /**
     * Card template version
     * @var string
     */
    private $version;

    /**
     * Service options used to configure the job
     * @var array
     */
    private $serviceOptions;

    /**
     * List of data parameters for the service
     * @var ServiceParameter[]
     */
    private $parameters;

    /**
     * Service security domains
     * @var SecurityDomain[]
     */
    private $securityDomains;

    /**
     * Service request time limit in minutes (-1 for unlimited)
     * @var int
     */
    private $requestTimeLimit;

    /**
     * Card print destination
     * @var string
     */
    private $destination;

    /**
     * Service request name
     * @var string
     */
    private $requestName;


    /**
     * Constructs and initializes the service object using the specified
     * json response data returned by the server.
     *
     * @param array $data Server response data
     */
    function __construct($data)
    {
        $this->type = $data["type"];
        $this->name = $data["name"];
        $this->description = $data["description"];
        $this->templateId = $data["templateId"];
        $this->templateName = $data["templateName"];
        $this->version = $data["version"];
        $this->serviceOptions = array();
        $this->parameters = array();
        $this->securityDomains = array();
        $this->requestTimeLimit = isset($data["requestTimeLimit"]) ? $data["requestTimeLimit"] : -1;
        $this->destination = isset($data["destination"]) ? $data["destination"] : "";
        $this->requestName = isset($data["requestName"]) ? $data["requestName"] : '';

        foreach ($data["parameters"] as $parameter) {
            array_push($this->parameters, new ServiceParameter($parameter["parameter"]));
        }

        foreach ($data["securityDomains"] as $securityDomain) {
            array_push($this->securityDomains, new SecurityDomain($securityDomain));
        }
    }

    /**
     * Returns the service type name
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Sets the service type name
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * Returns the service name
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets the service name
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Returns the service description
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Sets the service description
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * Returns the card template unique Id
     * @return string
     */
    public function getTemplateId()
    {
        return $this->templateId;
    }

    /**
     * Sets the card template unique Id
     * @param string $templateId
     */
    public function setTemplateId($templateId)
    {
        $this->templateId = $templateId;
    }

    /**
     * Returns the card template name
     * @return string
     */
    public function getTemplateName()
    {
        return $this->templateName;
    }

    /**
     * Sets the card template name
     * @param string $templateName
     */
    public function setTemplateName($templateName)
    {
        $this->templateName = $templateName;
    }

    /**
     * Returns the card template name
     * @return string
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * Sets the card template name
     * @param string $version
     */
    public function setVersion($version)
    {
        $this->version = $version;
    }

    /**
     * Adds a service option setting to the production template for inclusion in the* production
     * request. CardRequestService options are simple string key/value pairs that can be used to
     * control features such as printer input hopper selection and customize the configuration of
     * specialized job services such as the Card Read CardRequestService.
     * @param string $optionName CardRequestService parameter name
     * @param string $optionValue CardRequestService option value
     */
    public function addServiceOption($optionName, $optionValue)
    {
        if (empty($optionName)) {
            throw new \InvalidArgumentException("Invalid service option name: " . $optionName);
        }
        $this->serviceOptions[$optionName] = $optionValue;
    }

    /**
     * Returns the card service options
     * @return array
     */
    public function getServiceOptions()
    {
        return $this->serviceOptions;
    }

    /**
     * Returns the data parameters for the service
     * @return ServiceParameter[]
     */
    public function getParameters()
    {
        return $this->parameters;
    }

    /**
     * Sets the data parameters for the service
     * @param ServiceParameter[] $parameters
     */
    public function setParameters($parameters)
    {
        $this->parameters = $parameters;
    }

    /**
     * Returns the security domains for the service
     * @return SecurityDomain[]
     */
    public function getSecurityDomains()
    {
        return $this->securityDomains;
    }

    /**
     * Sets the security domains for the service
     * @param SecurityDomain[] $securityDomains
     */
    public function setSecurityDomains($securityDomains)
    {
        $this->securityDomains = $securityDomains;
    }

    /**
     * Returns the request timeout in minutes, -1 for unlimited
     * @return int
     */
    public function getRequestTimeLimit()
    {
        return $this->requestTimeLimit;
    }

    /**
     * Sets the request timeout in minutes, -1 for unlimited
     * @param int $requestTimeLimit
     */
    public function setRequestTimeLimit($requestTimeLimit)
    {
        $this->requestTimeLimit = $requestTimeLimit;
    }

    /**
     * Returns the card print destination
     * @return string
     */
    public function getDestination()
    {
        return $this->destination;
    }

    /**
     * Sets the card print destination
     * @param string $destination
     */
    public function setDestination($destination)
    {
        $this->destination = $destination;
    }

    /**
     * Returns the card request display name
     * @return string
     */
    public function getRequestName()
    {
        return $this->requestName;
    }

    /**
     * Sets the card request display name
     * @param string $requestName
     */
    public function setRequestName($requestName)
    {
        $this->requestName = $requestName;
    }
}