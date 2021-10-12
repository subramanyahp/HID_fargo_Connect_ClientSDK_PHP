<?php

use CardServices\DataType;
use CardServices\PrinterOption;
use CardServices\ProfileParamConst;
use CardServices\ServiceType;



class ExceptionTest extends \PHPUnit\Framework\TestCase
{

       
        /**
     * @expectedException \Exception
     * @expectedExceptionMessageRegExp /^a < b\.$/
     */
    public function testClientConfigException(){

        $this->expectException(CardServices\CardServicesClientException::class);
        $this->expectExceptionMessage('Client configuration object is null');
        $class = new \App\Collections;
        $result = $class->Exception_ClientConfigTest();

    }

        /**
     * @expectedException \Exception
     * @expectedExceptionMessageRegExp /^a < b\.$/
     */
    public function testAPIkeyException(){

        $this->expectException(CardServices\CardServicesClientException::class);
        $this->expectExceptionMessage('API Key cannot be null or empty');
        $class = new \App\Collections;
        $result = $class->Exception_ApikeyTest();

    }
 
        /**
     * @expectedException \Exception
     * @expectedExceptionMessageRegExp /^a < b\.$/
     */
    public function testServerProtocolException(){

        $this->expectException(CardServices\CardServicesClientException::class);
        $this->expectExceptionMessage('Server protocol cannot be null or empty');
        $class = new \App\Collections;
        $result = $class->Exception_ServerProtocolTest();

    }

       /**
     * @expectedException \Exception
     * @expectedExceptionMessageRegExp /^a < b\.$/
     */
    public function testServerProtocol_Exception(){

        $this->expectException(CardServices\CardServicesClientException::class);
        $this->expectExceptionMessage('Invalid server protocol, must be http or https : 024u');
        $class = new \App\Collections;
        $result = $class->Exception_ServerProtocol_Test();

    }

      /**
     * @expectedException \Exception
     * @expectedExceptionMessageRegExp /^a < b\.$/
     */
    public function testServerHostException(){

        $this->expectException(CardServices\CardServicesClientException::class);
        $this->expectExceptionMessage('Server Host Address cannot be null or empty');
        $class = new \App\Collections;
        $result = $class->Exception_serverHostTest();

    }

     /**
     * @expectedException \Exception
     * @expectedExceptionMessageRegExp /^a < b\.$/
     */
    public function testServerPortException(){

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid port: 184432. Must be between 1 and 65535');
        $class = new \App\Collections;     
        $result = $class->Exception_serverPortTest();
    }

     /**
     * @expectedException \Exception
     * @expectedExceptionMessageRegExp /^a < b\.$/
     */
    public function testAuthCertException(){

        $this->expectException(CardServices\CardServicesClientException::class);
        $this->expectExceptionMessage('Authentication certificate file cannot be null or empty');
        $class = new \App\Collections;     
        $result = $class->Exception_AuthCertFileTest();

    }

     /**
     * @expectedException \Exception
     * @expectedExceptionMessageRegExp /^a < b\.$/
     */
    public function testAuthCertFileException(){

        $this->expectException(CardServices\CardServicesClientException::class);
        $this->expectExceptionMessage('Authentication certificate file not found: ');
        $class = new \App\Collections;     
        $result = $class->Exception_AuthCertFile_pathTest();

    }

     /**
     * @expectedException \Exception
     * @expectedExceptionMessageRegExp /^a < b\.$/
     */
    public function testAuthCertPWDException(){

        $this->expectException(CardServices\CardServicesClientException::class);
        $this->expectExceptionMessage('Authentication certificate password cannot be null');
        $class = new \App\Collections;     
        $result = $class->Exception_AuthCertPWD_Test();

    }

     /**
     * @expectedException \Exception
     * @expectedExceptionMessageRegExp /^a < b\.$/
     */
    public function testCaCertException(){

        $this->expectException(CardServices\CardServicesClientException::class);
        $this->expectExceptionMessage('CA trust chain file cannot be null or empty');
        $class = new \App\Collections;     
        $result = $class->Exception_CaCertFile_Test();

    }

     /**
     * @expectedException \Exception
     * @expectedExceptionMessageRegExp /^a < b\.$/
     */
    public function testCaCertPathException(){

        $this->expectException(CardServices\CardServicesClientException::class);
        $this->expectExceptionMessage('CA trust chain file not found: ');
        $class = new \App\Collections;     
        $result = $class->Exception_CaCertFilePath_Test();

    }

    /**
     * @expectedException \Exception
     * @expectedExceptionMessageRegExp /^a < b\.$/
     */
    public function testDataCertException(){

        $this->expectException(CardServices\CardServicesClientException::class);
        $this->expectExceptionMessage('Data certificate file cannot be null or empty');
        $class = new \App\Collections;     
        $result = $class->Exception_dataCert_Test();

    }

    /**
     * @expectedException \Exception
     * @expectedExceptionMessageRegExp /^a < b\.$/
     */
    public function testDataCertPathException(){

        $this->expectException(CardServices\CardServicesClientException::class);
        $this->expectExceptionMessage('Data certificate file not found: ');
        $class = new \App\Collections;     
        $result = $class->Exception_DataCertFilePath_Test();

    }

    /**
     * @expectedException \Exception
     * @expectedExceptionMessageRegExp /^a < b\.$/
     */
    public function testDataCertPWDException(){

        $this->expectException(CardServices\CardServicesClientException::class);
        $this->expectExceptionMessage('Data Certificate Password cannot be null');
        $class = new \App\Collections;     
        $result = $class->Exception_DataCertPWD_Test();

    }

}