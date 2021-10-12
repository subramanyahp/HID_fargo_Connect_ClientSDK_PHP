<?php
/**
 * HID FARGO Connect - Cloud Card Issuance Solution
 * Copyright (c) 2016-2020. eXtensia Technologies, All rights reserved
 */

namespace CardServices;

include_once 'ParamValidator.php';

/**
 * Class representing a service parameter in server responses
 *
 * @package CardServices
 */
class ServiceParameter
{
    /**
     * Parameter data type name. See constants in the DataType class for
     * supported data type names.
     * @var string
     */
    private $dataType;

    /**
     * Parameter name
     * @var string
     */
    private $name;

    /**
     * Flag indicating if the parameter is required
     * @var bool
     */
    private $required;

    /**
     * Parameter default value
     * @var string
     */
    private $defaultValue;

    /**
     * Parameter data value
     * @var string
     */
    private $value;

    /**
     * Preferred image height for the IMAGE data type (-1 for none).
     * @var int
     */
    private $preferredHeight;

    /**
     * Preferred image width for the IMAGE data type (-1 for none).
     * @var int
     */
    private $preferredWidth;


    /**
     * Constructs and initializes the service parameter object using the specified
     * json response data returned by the server.
     *
     * @param array $data Server response data
     */
    function __construct($data)
    {
        $this->dataType = $data["dataType"];
        $this->name = $data["name"];
        $this->required = $data["required"];
        $this->defaultValue = $data["defaultValue"];
        $this->value = $data["value"];
        $this->preferredHeight = isset($data["preferredHeight"]) ? $data["preferredHeight"] : -1;
        $this->preferredWidth = isset($data["preferredWidth"]) ? $data["preferredWidth"] : -1;
    }

    /**
     * Returns the parameter data type name
     * @return string
     */
    public function getDataType()
    {
        return $this->dataType;
    }

    /**
     * Sets the parameter data type name
     * @param string $dataType
     */
    public function setDataType($dataType)
    {
        $this->dataType = $dataType;
    }

    /**
     * Returns the parameter name
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets the parameter name
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Returns the parameter required indicator flag
     * @return bool
     */
    public function getRequired()
    {
        return $this->required;
    }

    /**
     * Sets the parameter required indicator flag
     * @param bool $required
     */
    public function setRequired($required)
    {
        $this->required = $required;
    }

    /**
     * Returns the parameter default value
     * @return string
     */
    public function getDefaultValue()
    {
        return $this->defaultValue;
    }

    /**
     * Sets the parameter default value
     * @param string $defaultValue
     */
    public function setDefaultValue($defaultValue)
    {
        $this->defaultValue = $defaultValue;
    }

    /**
     * Returns the parameter data value
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Sets the parameter data value
     * @param string $value
     */
    public function setValue($value)
    {
        if ($this->getRequired()) {
            ParamValidator::validateIsNotNullOrEmptyString($value, $this->getName());
        } else if ($this->getDataType() === DataType::Image) {
            ParamValidator::validateIsImage($value, $this->getName());
        }
        $this->value = $value;
    }

    /**
     * Returns the preferred image height for the IMAGE data type
     * @return int
     */
    public function getPreferredHeight()
    {
        return $this->preferredHeight;
    }

    /**
     * Sets the preferred image height for the IMAGE data type
     * @param int $preferredHeight
     */
    public function setPreferredHeight($preferredHeight)
    {
        $this->preferredHeight = $preferredHeight;
    }

    /**
     * Returns the preferred image width for the IMAGE data type
     * @return int
     */
    public function getPreferredWidth()
    {
        return $this->preferredWidth;
    }

    /**
     * Sets the preferred image width for the IMAGE data type
     * @param int $preferredWidth
     */
    public function setPreferredWidth($preferredWidth)
    {
        $this->preferredWidth = $preferredWidth;
    }
}