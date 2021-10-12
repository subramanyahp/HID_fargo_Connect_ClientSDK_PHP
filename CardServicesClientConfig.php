<?php
/**
 * HID FARGO Connect - Cloud Card Issuance Solution
 * Copyright (c) 2016-2020. eXtensia Technologies, All rights reserved
 */

namespace CardServices;

/**
 * Class containing the configuration settings for the SDK client
 *
 * @package CardServices
 */
class CardServicesClientConfig
{
    /**
     * Server API key formatted as hexadecimal string
     * @var string
     */
    private $apikey;

    /**
     * Connection protocol for the server connection. The supported values
     * are http and https (default).
     * @var string
     */
    private $serverProtocol;

    /**
     * Host name for the server connection. The host name can be specified
     * as a DNS name or IP addresses.
     * @var string
     */
    private $serverHost;

    /**
     * TCP port number for the server connection.
     * @var int
     */
    private $serverPort;

    /**
     * Client authentication certificate file to use for TLS mutual authentication
     * with the server. The certificate file must contain the client certificate
     * public key, certificate chain and private key stored in PEM format.
     * @var string
     */
    private $authCertFile;

    /**
     * Client authentication certificate password. This field is provided to support
     * password protected certificate file formats.
     * @var string
     */
    private $authCertPwd;

    /**
     * Certificate trust chain file to use for TLS mutual authentication with the
     * server. The file must contain the CA and intermediate trust chain certificates
     * corresponding to the server TLS certificate. The certificate chain must be in
     * PEM format.
     * @var string
     */
    private $caCertFile;

    /**
     * Certificate to use for data encryption and signing.
     * @var string
     */
    private $dataCertFile;

    /**
     * Data encryption certificate password
     * @var string
     */
    private $dataCertPwd;


    /**
     * Constructs and initializes the SDK client configuration.
     * The serverProtocol is set to https by default.
     */
    function __construct()
    {
        $this->serverProtocol = "https";
    }

    /**
     * Returns the server API key formatted as hexadecimal string
     * @return string
     */
    public function getApikey()
    {
        return $this->apikey;
    }

    /**
     * Sets the server API key formatted as hexadecimal string
     * @param string $apikey
     */
    public function setApikey($apikey)
    {
        $this->apikey = $apikey;
    }

    /**
     * Returns the connection protocol to use for server connections. The
     * supported values are http and https (default).
     * @return string
     */
    public function getServerProtocol()
    {
        return $this->serverProtocol;
    }

    /**
     * Sets the connection protocol to use for server connections. The
     * supported values are http and https (default).
     * @param string $serverProtocol
     */
    public function setServerProtocol($serverProtocol)
    {
        $this->serverProtocol = $serverProtocol;
    }

    /**
     * Returns the host name used for the server connection. The host name
     * can be specified as a DNS name or IP address.
     * @return string
     */
    public function getServerHost()
    {
        return $this->serverHost;
    }

    /**
     * Sets the host name used for server connections.
     * @param string $serverHost
     */
    public function setServerHost($serverHost)
    {
        $this->serverHost = $serverHost;
    }

    /**
     * Returns the TCP port number used for server connections.
     * @return int
     */
    public function getServerPort()
    {
        return $this->serverPort;
    }

    /**
     * Sets the TCP port number used for server connections.
     * @param int $serverPort
     */
    public function setServerPort($serverPort)
    {
        $this->serverPort = $serverPort;
    }

    /**
     * Returns the client authentication certificate file used for
     * TLS mutual authentication with the server.
     * @return string
     */
    public function getAuthCertFile()
    {
        return $this->authCertFile;
    }

    /**
     * Sets the client authentication certificate file used for
     * TLS mutual authentication with the server.
     * @param string $authCertFile
     */
    public function setAuthCertFile($authCertFile)
    {
        $this->authCertFile = $authCertFile;
    }

    /**
     * Returns the client authentication certificate password. This
     * property is used for password protected certificate file formats.
     * @return string
     */
    public function getAuthCertPwd()
    {
        return $this->authCertPwd;
    }

    /**
     * Sets the client authentication certificate password. This
     * property is used for password protected certificate file formats.
     * @param string $authCertPwd
     */
    public function setAuthCertPwd($authCertPwd)
    {
        $this->authCertPwd = $authCertPwd;
    }

    /**
     * Returns the certificate trust chain file in PEM format to use for
     * TLS mutual authentication with the server.
     * @return string
     */
    public function getCaCertFile()
    {
        return $this->caCertFile;
    }

    /**
     * Sets the certificate trust chain file in PEM format to use for
     * TLS mutual authentication with the server.
     * @param string $caCertFile
     */
    public function setCaCertFile($caCertFile)
    {
        $this->caCertFile = $caCertFile;
    }

    /**
     * Returns the certificate file to use for data encryption and signing.
     * @return string
     */
    public function getDataCertFile()
    {
        return $this->dataCertFile;
    }

    /**
     * Sets the certificate file to use for data encryption and signing.
     * @param string $dataCertFile
     */
    public function setDataCertFile($dataCertFile)
    {
        $this->dataCertFile = $dataCertFile;
    }

    /**
     * Returns the data encryption and signing certificate password.
     * @return string
     */
    public function getDataCertPwd()
    {
        return $this->dataCertPwd;
    }

    /**
     * Sets the data encryption and signing certificate password.
     * @param string $dataCertPwd
     */
    public function setDataCertPwd($dataCertPwd)
    {
        $this->dataCertPwd = $dataCertPwd;
    }
}
