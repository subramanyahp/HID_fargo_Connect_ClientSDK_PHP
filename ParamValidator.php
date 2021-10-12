<?php
/**
 * HID FARGO Connect - Cloud Card Issuance Solution
 * Copyright (c) 2016-2020. eXtensia Technologies, All rights reserved
 */

namespace CardServices;

/**
 * Class implementing static data parameter validation methods
 *
 * @package CardServices
 */
class ParamValidator
{
    /**
     * Validates whether a string parameter is neither empty nor null.
     * @param string $value Value to validate
     * @param string $parameterName Parameter name being validated
     * @throws \InvalidArgumentException
     */
    public static function validateIsNotNullOrEmptyString($value, $parameterName)
    {
        if (!isset($value) || trim($value) === '') {
            throw new \InvalidArgumentException('Text parameter "' . $parameterName . '"" is required. Value was null or empty.');
        }
    }

    /**
     * Validates whether an image parameter value is a path to a valid image.
     * @param string $value Value to validate
     * @param string $parameterName Parameter name being validated
     * @throws \InvalidArgumentException
     */
    public static function validateIsImage($value, $parameterName)
    {
        if ($value == '') {
            throw new \InvalidArgumentException('Image parameter "' . $parameterName . '" is invalid: ' . $value);
        }

        if (!file_exists($value)) {
            throw new \InvalidArgumentException('Image parameter "' . $parameterName . '" file path invalid: ' . $value);
        } else {
            $extension = strtolower(pathinfo($value)['extension']);

            if ($extension != 'jpg' && $extension != 'png') {
                throw new \InvalidArgumentException('Image parameter "' . $parameterName . '" must be a PNG or JPG image: ' . $value);
            }
        }
    }

    /**
     * Validates whether a list parameter value is one of the available options.
     * @param string $value Value to validate
     * @param array $options Array of allowed option values
     * @param string $parameterName Parameter name being validated
     */
    public static function validateIsOption($value, $options, $parameterName)
    {
        if (!in_array($value, $options)) {
            throw new \InvalidArgumentException('Parameter "' . $parameterName . '" value is not a valid option: "'
                . $value . '" expected one of: ' . implode(",", $options));
        }
    }

    /**
     * Validates whether a parameter matches a regex pattern.
     * @param string $value Value to validate
     * @param string $regexPattern Regular expression pattern
     * @param string $parameterName Parameter name being validated
     */
    public static function validateRegex($value, $regexPattern, $parameterName)
    {
        if (!preg_match($regexPattern, $value)) {
            throw new \InvalidArgumentException('Parameter ' . $parameterName . ' value does not match expression: '
                . $regexPattern . '  value: ' . $value);
        }
    }
}