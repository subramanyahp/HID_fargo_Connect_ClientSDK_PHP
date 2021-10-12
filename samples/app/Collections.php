<?php

namespace App;
use App\CardServicesClientException\CardServicesClientException_test;

use CardServices\DataType;
use CardServices\PrinterOption;
use CardServices\ProfileParamConst;
use CardServices\ServiceType;

require '../vendor/autoload.php';

        include_once '../Client.php';
        include_once '../DataType.php';
        include_once '../ServiceType.php';
        include_once '../PrinterOption.php';
        include_once '../ProfileParamConst.php';
        include_once '../ProductionProfileConfig.php';

class Collections{


            public function OrgName(){
                
                $serverProtocol ="https";
                $serverHost ="test.api.hfc.hidglobal.com";
                $serverPort =18443;
    
                /*
                * Server API key required for SDK access. The API key is provided
                * as a hexadecimal string.
                */
               // $apiKey ='';
                $apiKey ='528DFB0B54B2438A5F631E94754BA4DA088E0EA1CF9700EF4ACE0B4C6D49F957';
    
                /*
                * Client authentication certificate and CA trust chain required for
                * server access. The client certificate and trust chain must be
                * in PEM format.
                */
                $authCertFile ='C:/HFCCertification/Schlumberger-Development-Certs/PHP/Schlumberger_Client_API_Auth_Cert.pem';
    
                $authCertPwd ="xgWkY3uwSDX2JX1qyvi7";
                $caCertFile ='C:/Users/subheg/Documents/subramanya/Fargo/Morris/Card_Services_CA_Chain.pem';
    
                /*
                * Data encryption and signing certificate. The certificate must be
                * in .P12 format.
                */
                $dataCertFile ='C:/HFCCertification/Schlumberger-Development-Certs/PHP/Schlumberger_Data_Encryption_Certificate.p12';
                $dataCertPwd ="xgWkY3uwSDX2JX1qyvi7";
    

                $clientConfig = new \CardServices\CardServicesClientConfig();
                $clientConfig->setServerProtocol($serverProtocol);
                $clientConfig->setServerHost($serverHost);
                $clientConfig->setServerPort($serverPort);
                $clientConfig->setApikey($apiKey);
                $clientConfig->setAuthCertFile($authCertFile);
                $clientConfig->setAuthCertPwd($authCertPwd);
                $clientConfig->setCaCertFile($caCertFile);
                $clientConfig->setDataCertFile($dataCertFile);
                $clientConfig->setDataCertPwd($dataCertPwd);

                $client = new \CardServices\Client($clientConfig);

                    /*
                    * List the available organizations and select the first one for demo purposes.
                    */
                    $organization = $this->selectOrganization($client);
                    
                   // echo "\nUsing Organization: " . $organization->getName() . "\n";  

                    return $organization->getName();
            }
    
            public function OrgID()
            {
                $serverProtocol ="https";
                $serverHost ="test.api.hfc.hidglobal.com";
                $serverPort =18443;
    
                /*
                * Server API key required for SDK access. The API key is provided
                * as a hexadecimal string.
                */
                $apiKey ='528DFB0B54B2438A5F631E94754BA4DA088E0EA1CF9700EF4ACE0B4C6D49F957';
    
                /*
                * Client authentication certificate and CA trust chain required for
                * server access. The client certificate and trust chain must be
                * in PEM format.
                */
                $authCertFile ='C:/HFCCertification/Schlumberger-Development-Certs/PHP/Schlumberger_Client_API_Auth_Cert.pem';
    
                $authCertPwd ="xgWkY3uwSDX2JX1qyvi7";
                $caCertFile ='C:/Users/subheg/Documents/subramanya/Fargo/Morris/Card_Services_CA_Chain.pem';
    
                /*
                * Data encryption and signing certificate. The certificate must be
                * in .P12 format.
                */
                $dataCertFile ='C:/HFCCertification/Schlumberger-Development-Certs/PHP/Schlumberger_Data_Encryption_Certificate.p12';
                $dataCertPwd ="xgWkY3uwSDX2JX1qyvi7";
    

                $clientConfig = new \CardServices\CardServicesClientConfig();
                $clientConfig->setServerProtocol($serverProtocol);
                $clientConfig->setServerHost($serverHost);
                $clientConfig->setServerPort($serverPort);
                $clientConfig->setApikey($apiKey);
                $clientConfig->setAuthCertFile($authCertFile);
                $clientConfig->setAuthCertPwd($authCertPwd);
                $clientConfig->setCaCertFile($caCertFile);
                $clientConfig->setDataCertFile($dataCertFile);
                $clientConfig->setDataCertPwd($dataCertPwd);

                $client = new \CardServices\Client($clientConfig);

                    /*
                    * List the available organizations and select the first one for demo purposes.
                    */
                    $organization = $this->selectOrganization($client);
                    
                   // echo "\nUsing Organization: " . $organization->getName() . "\n";  

                  //  echo "\nUsing Organization: " . $organization->getOrganizationId() . "\n"; 

                    return $organization->getOrganizationId();
            }

            public function Location(){
                
                $serverProtocol ="https";
                $serverHost ="test.api.hfc.hidglobal.com";
                $serverPort =18443;
    
                /*
                * Server API key required for SDK access. The API key is provided
                * as a hexadecimal string.
                */
                $apiKey ='528DFB0B54B2438A5F631E94754BA4DA088E0EA1CF9700EF4ACE0B4C6D49F957';
    
                /*
                * Client authentication certificate and CA trust chain required for
                * server access. The client certificate and trust chain must be
                * in PEM format.
                */
                $authCertFile ='C:/HFCCertification/Schlumberger-Development-Certs/PHP/Schlumberger_Client_API_Auth_Cert.pem';
    
                $authCertPwd ="xgWkY3uwSDX2JX1qyvi7";
                $caCertFile ='C:/Users/subheg/Documents/subramanya/Fargo/Morris/Card_Services_CA_Chain.pem';
    
                /*
                * Data encryption and signing certificate. The certificate must be
                * in .P12 format.
                */
                $dataCertFile ='C:/HFCCertification/Schlumberger-Development-Certs/PHP/Schlumberger_Data_Encryption_Certificate.p12';
                $dataCertPwd ="xgWkY3uwSDX2JX1qyvi7";
    

                $clientConfig = new \CardServices\CardServicesClientConfig();
                $clientConfig->setServerProtocol($serverProtocol);
                $clientConfig->setServerHost($serverHost);
                $clientConfig->setServerPort($serverPort);
                $clientConfig->setApikey($apiKey);
                $clientConfig->setAuthCertFile($authCertFile);
                $clientConfig->setAuthCertPwd($authCertPwd);
                $clientConfig->setCaCertFile($caCertFile);
                $clientConfig->setDataCertFile($dataCertFile);
                $clientConfig->setDataCertPwd($dataCertPwd);

                $client = new \CardServices\Client($clientConfig);

                    /*
                    * List the available organizations and select the first one for demo purposes.
                    */
                    $organization = $this->selectOrganization($client);

                    $location = $this->locationinfo($client,$organization->getOrganizationId());
                   
                  //  echo "\nUsing Location Name: " . $location->getLocationName() . "\n";  

                    return $location->getLocationName();
            }
    
            public function LocationID(){
                
                $serverProtocol ="https";
                $serverHost ="test.api.hfc.hidglobal.com";
                $serverPort =18443;
    
                /*
                * Server API key required for SDK access. The API key is provided
                * as a hexadecimal string.
                */
                $apiKey ='528DFB0B54B2438A5F631E94754BA4DA088E0EA1CF9700EF4ACE0B4C6D49F957';
    
                /*
                * Client authentication certificate and CA trust chain required for
                * server access. The client certificate and trust chain must be
                * in PEM format.
                */
                $authCertFile ='C:/HFCCertification/Schlumberger-Development-Certs/PHP/Schlumberger_Client_API_Auth_Cert.pem';
    
                $authCertPwd ="xgWkY3uwSDX2JX1qyvi7";
                $caCertFile ='C:/Users/subheg/Documents/subramanya/Fargo/Morris/Card_Services_CA_Chain.pem';
    
                /*
                * Data encryption and signing certificate. The certificate must be
                * in .P12 format.
                */
                $dataCertFile ='C:/HFCCertification/Schlumberger-Development-Certs/PHP/Schlumberger_Data_Encryption_Certificate.p12';
                $dataCertPwd ="xgWkY3uwSDX2JX1qyvi7";
    

                $clientConfig = new \CardServices\CardServicesClientConfig();
                $clientConfig->setServerProtocol($serverProtocol);
                $clientConfig->setServerHost($serverHost);
                $clientConfig->setServerPort($serverPort);
                $clientConfig->setApikey($apiKey);
                $clientConfig->setAuthCertFile($authCertFile);
                $clientConfig->setAuthCertPwd($authCertPwd);
                $clientConfig->setCaCertFile($caCertFile);
                $clientConfig->setDataCertFile($dataCertFile);
                $clientConfig->setDataCertPwd($dataCertPwd);

                $client = new \CardServices\Client($clientConfig);

                    /*
                    * List the available organizations and select the first one for demo purposes.
                    */
                    $organization = $this->selectOrganization($client);

                    $location = $this->locationinfo($client,$organization->getOrganizationId());
                   
                   // echo "\nUsing Location Name: " . $location->getLocationID() . "\n";  

                    return $location->getLocationID();
            }

            public function ProdProfileName(){
                
                $serverProtocol ="https";
                $serverHost ="test.api.hfc.hidglobal.com";
                $serverPort =18443;
    
                /*
                * Server API key required for SDK access. The API key is provided
                * as a hexadecimal string.
                */
                $apiKey ='528DFB0B54B2438A5F631E94754BA4DA088E0EA1CF9700EF4ACE0B4C6D49F957';
    
                /*
                * Client authentication certificate and CA trust chain required for
                * server access. The client certificate and trust chain must be
                * in PEM format.
                */
                $authCertFile ='C:/HFCCertification/Schlumberger-Development-Certs/PHP/Schlumberger_Client_API_Auth_Cert.pem';
    
                $authCertPwd ="xgWkY3uwSDX2JX1qyvi7";
                $caCertFile ='C:/Users/subheg/Documents/subramanya/Fargo/Morris/Card_Services_CA_Chain.pem';
    
                /*
                * Data encryption and signing certificate. The certificate must be
                * in .P12 format.
                */
                $dataCertFile ='C:/HFCCertification/Schlumberger-Development-Certs/PHP/Schlumberger_Data_Encryption_Certificate.p12';
                $dataCertPwd ="xgWkY3uwSDX2JX1qyvi7";
    

                $clientConfig = new \CardServices\CardServicesClientConfig();
                $clientConfig->setServerProtocol($serverProtocol);
                $clientConfig->setServerHost($serverHost);
                $clientConfig->setServerPort($serverPort);
                $clientConfig->setApikey($apiKey);
                $clientConfig->setAuthCertFile($authCertFile);
                $clientConfig->setAuthCertPwd($authCertPwd);
                $clientConfig->setCaCertFile($caCertFile);
                $clientConfig->setDataCertFile($dataCertFile);
                $clientConfig->setDataCertPwd($dataCertPwd);

                $client = new \CardServices\Client($clientConfig);

                    /*
                    * List the available organizations and select the first one for demo purposes.
                    */
                    $organization = $this->selectOrganization($client);

                    $productionProfiles = $this->selectProductionProfile($client,$organization->getOrganizationId());
                   
                   // echo "\nUsing productionProfiles Name: " . $productionProfiles->getName() . "\n";  

                    return $productionProfiles->getName();
            }

            public function ProdProfileID(){
                
                $serverProtocol ="https";
                $serverHost ="test.api.hfc.hidglobal.com";
                $serverPort =18443;
    
                /*
                * Server API key required for SDK access. The API key is provided
                * as a hexadecimal string.
                */
                $apiKey ='528DFB0B54B2438A5F631E94754BA4DA088E0EA1CF9700EF4ACE0B4C6D49F957';
    
                /*
                * Client authentication certificate and CA trust chain required for
                * server access. The client certificate and trust chain must be
                * in PEM format.
                */
                $authCertFile ='C:/HFCCertification/Schlumberger-Development-Certs/PHP/Schlumberger_Client_API_Auth_Cert.pem';
    
                $authCertPwd ="xgWkY3uwSDX2JX1qyvi7";
                $caCertFile ='C:/Users/subheg/Documents/subramanya/Fargo/Morris/Card_Services_CA_Chain.pem';
    
                /*
                * Data encryption and signing certificate. The certificate must be
                * in .P12 format.
                */
                $dataCertFile ='C:/HFCCertification/Schlumberger-Development-Certs/PHP/Schlumberger_Data_Encryption_Certificate.p12';
                $dataCertPwd ="xgWkY3uwSDX2JX1qyvi7";
    

                $clientConfig = new \CardServices\CardServicesClientConfig();
                $clientConfig->setServerProtocol($serverProtocol);
                $clientConfig->setServerHost($serverHost);
                $clientConfig->setServerPort($serverPort);
                $clientConfig->setApikey($apiKey);
                $clientConfig->setAuthCertFile($authCertFile);
                $clientConfig->setAuthCertPwd($authCertPwd);
                $clientConfig->setCaCertFile($caCertFile);
                $clientConfig->setDataCertFile($dataCertFile);
                $clientConfig->setDataCertPwd($dataCertPwd);

                $client = new \CardServices\Client($clientConfig);

                    /*
                    * List the available organizations and select the first one for demo purposes.
                    */
                    $organization = $this->selectOrganization($client);

                    $productionProfiles = $this->selectProductionProfile($client,$organization->getOrganizationId());
                   
                  //  echo "\nUsing productionProfiles Name: " . $productionProfiles->getProfileId() . "\n";  

                    return $productionProfiles->getProfileId();
            }

            public function PrintDestName(){
                
                $serverProtocol ="https";
                $serverHost ="test.api.hfc.hidglobal.com";
                $serverPort =18443;
    
                /*
                * Server API key required for SDK access. The API key is provided
                * as a hexadecimal string.
                */
                $apiKey ='528DFB0B54B2438A5F631E94754BA4DA088E0EA1CF9700EF4ACE0B4C6D49F957';
    
                /*
                * Client authentication certificate and CA trust chain required for
                * server access. The client certificate and trust chain must be
                * in PEM format.
                */
                $authCertFile ='C:/HFCCertification/Schlumberger-Development-Certs/PHP/Schlumberger_Client_API_Auth_Cert.pem';
    
                $authCertPwd ="xgWkY3uwSDX2JX1qyvi7";
                $caCertFile ='C:/Users/subheg/Documents/subramanya/Fargo/Morris/Card_Services_CA_Chain.pem';
    
                /*
                * Data encryption and signing certificate. The certificate must be
                * in .P12 format.
                */
                $dataCertFile ='C:/HFCCertification/Schlumberger-Development-Certs/PHP/Schlumberger_Data_Encryption_Certificate.p12';
                $dataCertPwd ="xgWkY3uwSDX2JX1qyvi7";
    

                $clientConfig = new \CardServices\CardServicesClientConfig();
                $clientConfig->setServerProtocol($serverProtocol);
                $clientConfig->setServerHost($serverHost);
                $clientConfig->setServerPort($serverPort);
                $clientConfig->setApikey($apiKey);
                $clientConfig->setAuthCertFile($authCertFile);
                $clientConfig->setAuthCertPwd($authCertPwd);
                $clientConfig->setCaCertFile($caCertFile);
                $clientConfig->setDataCertFile($dataCertFile);
                $clientConfig->setDataCertPwd($dataCertPwd);

                $client = new \CardServices\Client($clientConfig);

                    /*
                    * List the available organizations and select the first one for demo purposes.
                    */
                    $organization = $this->selectOrganization($client);

                    $printDestinations = $this->selectPrintDestination($client,$organization->getOrganizationId());
                   
                 //   echo "\nUsing productionProfiles Name: " . $printDestinations->getPrinterName() . "\n";  

                    return $printDestinations->getPrinterName();
            }

            public function PrintDestID(){
                
                $serverProtocol ="https";
                $serverHost ="test.api.hfc.hidglobal.com";
                $serverPort =18443;
    
                /*
                * Server API key required for SDK access. The API key is provided
                * as a hexadecimal string.
                */
                $apiKey ='528DFB0B54B2438A5F631E94754BA4DA088E0EA1CF9700EF4ACE0B4C6D49F957';
    
                /*
                * Client authentication certificate and CA trust chain required for
                * server access. The client certificate and trust chain must be
                * in PEM format.
                */
                $authCertFile ='C:/HFCCertification/Schlumberger-Development-Certs/PHP/Schlumberger_Client_API_Auth_Cert.pem';
    
                $authCertPwd ="xgWkY3uwSDX2JX1qyvi7";
                $caCertFile ='C:/Users/subheg/Documents/subramanya/Fargo/Morris/Card_Services_CA_Chain.pem';
    
                /*
                * Data encryption and signing certificate. The certificate must be
                * in .P12 format.
                */
                $dataCertFile ='C:/HFCCertification/Schlumberger-Development-Certs/PHP/Schlumberger_Data_Encryption_Certificate.p12';
                $dataCertPwd ="xgWkY3uwSDX2JX1qyvi7";
    

                $clientConfig = new \CardServices\CardServicesClientConfig();
                $clientConfig->setServerProtocol($serverProtocol);
                $clientConfig->setServerHost($serverHost);
                $clientConfig->setServerPort($serverPort);
                $clientConfig->setApikey($apiKey);
                $clientConfig->setAuthCertFile($authCertFile);
                $clientConfig->setAuthCertPwd($authCertPwd);
                $clientConfig->setCaCertFile($caCertFile);
                $clientConfig->setDataCertFile($dataCertFile);
                $clientConfig->setDataCertPwd($dataCertPwd);

                $client = new \CardServices\Client($clientConfig);

                    /*
                    * List the available organizations and select the first one for demo purposes.
                    */
                    $organization = $this->selectOrganization($client);

                    $printDestinations = $this->selectPrintDestination($client,$organization->getOrganizationId());
                   
                  //  echo "\nUsing productionProfiles Name: " . $printDestinations->getDestination() . "\n";  

                    return $printDestinations->getDestination();
            }

            public function ProdCardType(){
                
                $serverProtocol ="https";
                $serverHost ="test.api.hfc.hidglobal.com";
                $serverPort =18443;
    
                /*
                * Server API key required for SDK access. The API key is provided
                * as a hexadecimal string.
                */
                $apiKey ='528DFB0B54B2438A5F631E94754BA4DA088E0EA1CF9700EF4ACE0B4C6D49F957';
    
                /*
                * Client authentication certificate and CA trust chain required for
                * server access. The client certificate and trust chain must be
                * in PEM format.
                */
                $authCertFile ='C:/HFCCertification/Schlumberger-Development-Certs/PHP/Schlumberger_Client_API_Auth_Cert.pem';
    
                $authCertPwd ="xgWkY3uwSDX2JX1qyvi7";
                $caCertFile ='C:/Users/subheg/Documents/subramanya/Fargo/Morris/Card_Services_CA_Chain.pem';
    
                /*
                * Data encryption and signing certificate. The certificate must be
                * in .P12 format.
                */
                $dataCertFile ='C:/HFCCertification/Schlumberger-Development-Certs/PHP/Schlumberger_Data_Encryption_Certificate.p12';
                $dataCertPwd ="xgWkY3uwSDX2JX1qyvi7";
    

                $clientConfig = new \CardServices\CardServicesClientConfig();
                $clientConfig->setServerProtocol($serverProtocol);
                $clientConfig->setServerHost($serverHost);
                $clientConfig->setServerPort($serverPort);
                $clientConfig->setApikey($apiKey);
                $clientConfig->setAuthCertFile($authCertFile);
                $clientConfig->setAuthCertPwd($authCertPwd);
                $clientConfig->setCaCertFile($caCertFile);
                $clientConfig->setDataCertFile($dataCertFile);
                $clientConfig->setDataCertPwd($dataCertPwd);

                $client = new \CardServices\Client($clientConfig);

                    /*
                    * List the available organizations and select the first one for demo purposes.
                    */
                    $organization = $this->selectOrganization($client);

                    $printDestinations = $this->selectPrintDestination($client,$organization->getOrganizationId());
                   
                  //  echo "\nUsing productionProfiles Name: " . $printDestinations->getDestination() . "\n";  

                    $productionProfile = $this->selectProductionProfile($client, $organization->getOrganizationId());

                    $profileConfig = $client->getProductionProfileApi()->getProductionProfileParams($productionProfile->getProfileid());

                        /*
                        * Process the list of profile configuration parameters. By default only a single
                        * parameter named "CardType" of type ListParameter is required for card production
                        * requests. The "CardType" parameter is essentially a configurable enumerated type
                        * that maps a logical card type name (e.g. "Employee", "Student" etc) to a card
                        * template.
                        */
                        foreach ($profileConfig->getProfileParameters() as $profileParam) {

                            /*
                            * Fail if an unexpected parameter type is present
                            */
                            if (($profileParam->getDataType() != DataType::OptionList) ||
                                ($profileParam->getName() != ProfileParamConst::CardType)) {
                                throw new Exception('Unexpected profile parameter type: ' . $profileParam->getDataType());
                            }

                            /*
                            * Show the available card types for debug purposes
                            */
                         //   echo "Available CardType Options:\n\n";

                            foreach ($profileParam->getOptions() as $cardTypeName) {
                        //        echo '  ' . $cardTypeName . "\n";
                            }

                            /*
                            * Arbitrarily select the first card type for demo purposes. The supported card
                            * types are normally known in advance and the Option property is used to validate
                            * whether the desired card type is a valid option.
                            */
                            $availableCardTypes = $profileParam->getOptions();
                            $selectedCardType = $availableCardTypes[0];

                        //    echo "\nSelected CardType: " . $selectedCardType . "\n";
                            $profileParam->setValue($selectedCardType);
                        }
                      //  echo "selectedCardType:" . $selectedCardType . "\n";
                    
                        return $selectedCardType;

            }

            public function PrintedCard(){
                $serverProtocol ="https";
                $serverHost ="test.api.hfc.hidglobal.com";
                $serverPort =18443;
    
                /*
                * Server API key required for SDK access. The API key is provided
                * as a hexadecimal string.
                */
                $apiKey ='528DFB0B54B2438A5F631E94754BA4DA088E0EA1CF9700EF4ACE0B4C6D49F957';
    
                /*
                * Client authentication certificate and CA trust chain required for
                * server access. The client certificate and trust chain must be
                * in PEM format.
                */
                $authCertFile ='C:/HFCCertification/Schlumberger-Development-Certs/PHP/Schlumberger_Client_API_Auth_Cert.pem';
    
                $authCertPwd ="xgWkY3uwSDX2JX1qyvi7";
                $caCertFile ='C:/Users/subheg/Documents/subramanya/Fargo/Morris/Card_Services_CA_Chain.pem';
    
                /*
                * Data encryption and signing certificate. The certificate must be
                * in .P12 format.
                */
                $dataCertFile ='C:/HFCCertification/Schlumberger-Development-Certs/PHP/Schlumberger_Data_Encryption_Certificate.p12';
                $dataCertPwd ="xgWkY3uwSDX2JX1qyvi7";
    

                $clientConfig = new \CardServices\CardServicesClientConfig();
                $clientConfig->setServerProtocol($serverProtocol);
                $clientConfig->setServerHost($serverHost);
                $clientConfig->setServerPort($serverPort);
                $clientConfig->setApikey($apiKey);
                $clientConfig->setAuthCertFile($authCertFile);
                $clientConfig->setAuthCertPwd($authCertPwd);
                $clientConfig->setCaCertFile($caCertFile);
                $clientConfig->setDataCertFile($dataCertFile);
                $clientConfig->setDataCertPwd($dataCertPwd);

                $client = new \CardServices\Client($clientConfig);
      
                $jobDetails = $client->getJobApi()->getJob("JOB055FB17381DF4788891DD1277399F9F5");

                return $jobDetails->getJobStatus();

            }

            public function FailedCard(){
                $serverProtocol ="https";
                $serverHost ="test.api.hfc.hidglobal.com";
                $serverPort =18443;
    
                /*
                * Server API key required for SDK access. The API key is provided
                * as a hexadecimal string.
                */
                $apiKey ='528DFB0B54B2438A5F631E94754BA4DA088E0EA1CF9700EF4ACE0B4C6D49F957';
    
                /*
                * Client authentication certificate and CA trust chain required for
                * server access. The client certificate and trust chain must be
                * in PEM format.
                */
                $authCertFile ='C:/HFCCertification/Schlumberger-Development-Certs/PHP/Schlumberger_Client_API_Auth_Cert.pem';
    
                $authCertPwd ="xgWkY3uwSDX2JX1qyvi7";
                $caCertFile ='C:/Users/subheg/Documents/subramanya/Fargo/Morris/Card_Services_CA_Chain.pem';
    
                /*
                * Data encryption and signing certificate. The certificate must be
                * in .P12 format.
                */
                $dataCertFile ='C:/HFCCertification/Schlumberger-Development-Certs/PHP/Schlumberger_Data_Encryption_Certificate.p12';
                $dataCertPwd ="xgWkY3uwSDX2JX1qyvi7";
    

                $clientConfig = new \CardServices\CardServicesClientConfig();
                $clientConfig->setServerProtocol($serverProtocol);
                $clientConfig->setServerHost($serverHost);
                $clientConfig->setServerPort($serverPort);
                $clientConfig->setApikey($apiKey);
                $clientConfig->setAuthCertFile($authCertFile);
                $clientConfig->setAuthCertPwd($authCertPwd);
                $clientConfig->setCaCertFile($caCertFile);
                $clientConfig->setDataCertFile($dataCertFile);
                $clientConfig->setDataCertPwd($dataCertPwd);

                $client = new \CardServices\Client($clientConfig);
      
                $jobDetails = $client->getJobApi()->getJob("JOBC9914E45D536449BB5A5A8317A344A07");

                return $jobDetails->getJobStatus();

            }

            function selectOrganization($client)
            {
                $organizations = $client->getOrganizationApi()->listOrganizations();

                if (empty($organizations)) {
                    throw new Exception("No organizations found");
                }

              //  echo "\nAvailable Organizations:\n\n";

                foreach ($organizations as $organization) {
                //    echo "  " . $organization->getOrganizationId() . " -> " . $organization->getName() . "\n";
                }

                /*
                * Selecting the first organization for demo purposes
                */
                return $organizations[0];
            }

            function showOrganizationinfo($client, $organizationId)
            {
                /*
                * Enumerate the organizational units within the organization
                */
               // echo "\nOrganizational Units:\n\n";
                $organizationalunits = $client->getOrganizationApi()->listOrganizationalUnits($organizationId);

                foreach ($organizationalunits as $organizationalunit) {
               //     echo "  " . $organizationalunit->getOrganizationalUnitId() . " -> " . $organizationalunit->getname() . "\n";
                }

              //  echo "\nOrganization Locations:\n\n";

                $organizationLocations = $client->getOrganizationApi()->listOrganizationLocations($organizationId);

                foreach ($organizationLocations as $organizationLocation) {
                //    echo "  " . $organizationLocation->getLocationId() . " -> " . $organizationLocation->getLocationName() . "\n";
                }
            }

            function locationinfo($client, $organizationId)
            {
                /*
                * Enumerate the organizational units within the organization
                */
               // echo "\nOrganizational Units:\n\n";
              //  $organizationalunits = $client->getOrganizationApi()->listOrganizationalUnits($organizationId);

             //   foreach ($organizationalunits as $organizationalunit) {
             //       echo "  " . $organizationalunit->getOrganizationalUnitId() . " -> " . $organizationalunit->getname() . "\n";
             //   }
             $locationname = "";
              //  echo "\nOrganization Locations:\n\n";

                $organizationLocations = $client->getOrganizationApi()->listOrganizationLocations($organizationId);

               foreach ($organizationLocations as $organizationLocation) {
                //   echo "  " . $organizationLocation->getLocationId() . " -> " . $organizationLocation->getLocationName() . "\n";
                   $locationname = $organizationLocation->getLocationName();
               }

               //echo "  " . $organizationLocation->getLocationId() . " -> " . $organizationLocation->getLocationName() . "\n";
               return $organizationLocations[0];
            }


            function selectProductionProfile($client, $organizationId)
            {
                $productionProfiles = $client->getProductionProfileApi()->listProductionProfiles($organizationId);
            
                if (empty($productionProfiles)) {
                    throw new Exception("No production profiles found");
                }
            
              //  echo "\nAvailable Production Profiles:\n\n";
            
                foreach ($productionProfiles as $profile) {
                   // echo "  " . $profile->getProfileId() . " -> " . $profile->getName() . "\n";
                }
            
                /*
                 * Selecting the first profile for demo purposes
                 */
                return $productionProfiles[0];
            }

            
            function selectPrintDestination($client, $organizationId)
            {

                    $printDestinations = $client->getDeviceApi()->listPrintDestinationsForOrg($organizationId);

                    if (empty($printDestinations)) {
                        throw new Exception("No print destinations found");
                    }

                  //  echo "\nAvailable print destinations:\n\n";

                    foreach ($printDestinations as $destination) {
                 //       echo "  " . $destination->getDestination() . " -> " . $destination->getPrinterName() . "\n";
                    }

                    /*
                    * Selecting the first print destination for demo purposes
                    */
                    return $printDestinations[0];
            }

           
            function Exception_ApikeyTest()
            {
    
                $serverProtocol = "https";
                $serverHost ="test.api.hfc.hidglobal.com";
                $serverPort =18443;
                $apiKey ='';
                // $apiKey ='528DFB0B54B2438A5F631E94754BA4DA088E0EA1CF9700EF4ACE0B4C6D49F957';
                $authCertFile ='C:/HFCCertification/Schlumberger-Development-Certs/PHP/Schlumberger_Client_API_Auth_Cert.pem';
            
                $authCertPwd ="xgWkY3uwSDX2JX1qyvi7";
                $caCertFile ='C:/Users/subheg/Documents/subramanya/Fargo/Morris/Card_Services_CA_Chain.pem';
                $dataCertFile ='C:/HFCCertification/Schlumberger-Development-Certs/PHP/Schlumberger_Data_Encryption_Certificate.p12';
                $dataCertPwd ="xgWkY3uwSDX2JX1qyvi7";
            
                    $clientConfig = new \CardServices\CardServicesClientConfig();
                    $clientConfig->setServerProtocol($serverProtocol);
                    $clientConfig->setServerHost($serverHost);
                    $clientConfig->setServerPort($serverPort);
                    $clientConfig->setApikey($apiKey);
                    $clientConfig->setAuthCertFile($authCertFile);
                    $clientConfig->setAuthCertPwd($authCertPwd);
                    $clientConfig->setCaCertFile($caCertFile);
                    $clientConfig->setDataCertFile($dataCertFile);
                    $clientConfig->setDataCertPwd($dataCertPwd);

                    $client = new \CardServices\Client($clientConfig);

                        /*
                        * List the available organizations and select the first one for demo purposes.
                        */
                        $organization = $this->selectOrganization($client);
                        
                    // echo "\nUsing Organization: " . $organization->getName() . "\n";  

                        return $organization->getName();
            }

            function Exception_ClientConfigTest()
            {
      
                $serverProtocol = "https";
                $serverHost ="test.api.hfc.hidglobal.com";
                $serverPort =18443;
                $apiKey ='';
               // $apiKey ='528DFB0B54B2438A5F631E94754BA4DA088E0EA1CF9700EF4ACE0B4C6D49F957';
                $authCertFile ='C:/HFCCertification/Schlumberger-Development-Certs/PHP/Schlumberger_Client_API_Auth_Cert.pem';
           
                 $authCertPwd ="xgWkY3uwSDX2JX1qyvi7";
                $caCertFile ='C:/Users/subheg/Documents/subramanya/Fargo/Morris/Card_Services_CA_Chain.pem';
                $dataCertFile ='C:/HFCCertification/Schlumberger-Development-Certs/PHP/Schlumberger_Data_Encryption_Certificate.p12';
                $dataCertPwd ="xgWkY3uwSDX2JX1qyvi7";
           
                   $clientConfig = new \CardServices\CardServicesClientConfig();
                   $clientConfig->setServerProtocol($serverProtocol);
                   $clientConfig->setServerHost($serverHost);
                   $clientConfig->setServerPort($serverPort);
                   $clientConfig->setApikey($apiKey);
                   $clientConfig->setAuthCertFile($authCertFile);
                   $clientConfig->setAuthCertPwd($authCertPwd);
                   $clientConfig->setCaCertFile($caCertFile);
                   $clientConfig->setDataCertFile($dataCertFile);
                   $clientConfig->setDataCertPwd($dataCertPwd);
   
                   $client = new \CardServices\Client(null);
   
                       /*
                       * List the available organizations and select the first one for demo purposes.
                       */
                       $organization = $this->selectOrganization($client);
                       
                      // echo "\nUsing Organization: " . $organization->getName() . "\n";  
   
                       return $organization->getName();
            }
   
            function Exception_ServerProtocolTest()
            {
      
                $serverProtocol = "";
                $serverHost ="test.api.hfc.hidglobal.com";
                $serverPort =18443;
                $apiKey ='528DFB0B54B2438A5F631E94754BA4DA088E0EA1CF9700EF4ACE0B4C6D49F957';
                $authCertFile ='C:/HFCCertification/Schlumberger-Development-Certs/PHP/Schlumberger_Client_API_Auth_Cert.pem';
           
                 $authCertPwd ="xgWkY3uwSDX2JX1qyvi7";
                $caCertFile ='C:/Users/subheg/Documents/subramanya/Fargo/Morris/Card_Services_CA_Chain.pem';
                $dataCertFile ='C:/HFCCertification/Schlumberger-Development-Certs/PHP/Schlumberger_Data_Encryption_Certificate.p12';
                $dataCertPwd ="xgWkY3uwSDX2JX1qyvi7";
           
                   $clientConfig = new \CardServices\CardServicesClientConfig();
                   $clientConfig->setServerProtocol($serverProtocol);
                   $clientConfig->setServerHost($serverHost);
                   $clientConfig->setServerPort($serverPort);
                   $clientConfig->setApikey($apiKey);
                   $clientConfig->setAuthCertFile($authCertFile);
                   $clientConfig->setAuthCertPwd($authCertPwd);
                   $clientConfig->setCaCertFile($caCertFile);
                   $clientConfig->setDataCertFile($dataCertFile);
                   $clientConfig->setDataCertPwd($dataCertPwd);
   
                   $client = new \CardServices\Client($clientConfig);
   
                       /*
                       * List the available organizations and select the first one for demo purposes.
                       */
                       $organization = $this->selectOrganization($client);
                       
                      // echo "\nUsing Organization: " . $organization->getName() . "\n";  
   
                       return $organization->getName();
            }

            function Exception_ServerProtocol_Test()
            {
      
                $serverProtocol = "024u";
                $serverHost ="test.api.hfc.hidglobal.com";
                $serverPort =18443;
                $apiKey ='528DFB0B54B2438A5F631E94754BA4DA088E0EA1CF9700EF4ACE0B4C6D49F957';
                $authCertFile ='C:/HFCCertification/Schlumberger-Development-Certs/PHP/Schlumberger_Client_API_Auth_Cert.pem';
           
                 $authCertPwd ="xgWkY3uwSDX2JX1qyvi7";
                $caCertFile ='C:/Users/subheg/Documents/subramanya/Fargo/Morris/Card_Services_CA_Chain.pem';
                $dataCertFile ='C:/HFCCertification/Schlumberger-Development-Certs/PHP/Schlumberger_Data_Encryption_Certificate.p12';
                $dataCertPwd ="xgWkY3uwSDX2JX1qyvi7";
           
                   $clientConfig = new \CardServices\CardServicesClientConfig();
                   $clientConfig->setServerProtocol($serverProtocol);
                   $clientConfig->setServerHost($serverHost);
                   $clientConfig->setServerPort($serverPort);
                   $clientConfig->setApikey($apiKey);
                   $clientConfig->setAuthCertFile($authCertFile);
                   $clientConfig->setAuthCertPwd($authCertPwd);
                   $clientConfig->setCaCertFile($caCertFile);
                   $clientConfig->setDataCertFile($dataCertFile);
                   $clientConfig->setDataCertPwd($dataCertPwd);
   
                   $client = new \CardServices\Client($clientConfig);
   
                       /*
                       * List the available organizations and select the first one for demo purposes.
                       */
                       $organization = $this->selectOrganization($client);
                       
                      // echo "\nUsing Organization: " . $organization->getName() . "\n";  
   
                       return $organization->getName();
            }

            function Exception_serverHostTest()
            {
      
                $serverProtocol = "https";
                $serverHost ="";
                $serverPort =18443;
                $apiKey ='528DFB0B54B2438A5F631E94754BA4DA088E0EA1CF9700EF4ACE0B4C6D49F957';
                $authCertFile ='C:/HFCCertification/Schlumberger-Development-Certs/PHP/Schlumberger_Client_API_Auth_Cert.pem';
           
                 $authCertPwd ="xgWkY3uwSDX2JX1qyvi7";
                $caCertFile ='C:/Users/subheg/Documents/subramanya/Fargo/Morris/Card_Services_CA_Chain.pem';
                $dataCertFile ='C:/HFCCertification/Schlumberger-Development-Certs/PHP/Schlumberger_Data_Encryption_Certificate.p12';
                $dataCertPwd ="xgWkY3uwSDX2JX1qyvi7";
           
                   $clientConfig = new \CardServices\CardServicesClientConfig();
                   $clientConfig->setServerProtocol($serverProtocol);
                   $clientConfig->setServerHost($serverHost);
                   $clientConfig->setServerPort($serverPort);
                   $clientConfig->setApikey($apiKey);
                   $clientConfig->setAuthCertFile($authCertFile);
                   $clientConfig->setAuthCertPwd($authCertPwd);
                   $clientConfig->setCaCertFile($caCertFile);
                   $clientConfig->setDataCertFile($dataCertFile);
                   $clientConfig->setDataCertPwd($dataCertPwd);
   
                   $client = new \CardServices\Client($clientConfig);
   
                       /*
                       * List the available organizations and select the first one for demo purposes.
                       */
                       $organization = $this->selectOrganization($client);
                       
                      // echo "\nUsing Organization: " . $organization->getName() . "\n";  
   
                       return $organization->getName();
            }
            
            function Exception_serverPortTest()
            {
      
                $serverProtocol = "https";
                $serverHost ="test.api.hfc.hidglobal.com";
                $serverPort =184432;
                $apiKey ='528DFB0B54B2438A5F631E94754BA4DA088E0EA1CF9700EF4ACE0B4C6D49F957';
                $authCertFile ='C:/HFCCertification/Schlumberger-Development-Certs/PHP/Schlumberger_Client_API_Auth_Cert.pem';
           
                 $authCertPwd ="xgWkY3uwSDX2JX1qyvi7";
                $caCertFile ='C:/Users/subheg/Documents/subramanya/Fargo/Morris/Card_Services_CA_Chain.pem';
                $dataCertFile ='C:/HFCCertification/Schlumberger-Development-Certs/PHP/Schlumberger_Data_Encryption_Certificate.p12';
                $dataCertPwd ="xgWkY3uwSDX2JX1qyvi7";
           
                   $clientConfig = new \CardServices\CardServicesClientConfig();
                   $clientConfig->setServerProtocol($serverProtocol);
                   $clientConfig->setServerHost($serverHost);
                   $clientConfig->setServerPort($serverPort);
                   $clientConfig->setApikey($apiKey);
                   $clientConfig->setAuthCertFile($authCertFile);
                   $clientConfig->setAuthCertPwd($authCertPwd);
                   $clientConfig->setCaCertFile($caCertFile);
                   $clientConfig->setDataCertFile($dataCertFile);
                   $clientConfig->setDataCertPwd($dataCertPwd);
   
                   $client = new \CardServices\Client($clientConfig);
   
                       /*
                       * List the available organizations and select the first one for demo purposes.
                       */
                       $organization = $this->selectOrganization($client);
                       
                      // echo "\nUsing Organization: " . $organization->getName() . "\n";  
   
                       return $organization->getName();
            }

            function Exception_AuthCertFileTest()
            {
      
                $serverProtocol = "https";
                $serverHost ="test.api.hfc.hidglobal.com";
                $serverPort =184432;
                $apiKey ='528DFB0B54B2438A5F631E94754BA4DA088E0EA1CF9700EF4ACE0B4C6D49F957';
                $authCertFile ='';
           
                 $authCertPwd ="xgWkY3uwSDX2JX1qyvi7";
                $caCertFile ='C:/Users/subheg/Documents/subramanya/Fargo/Morris/Card_Services_CA_Chain.pem';
                $dataCertFile ='C:/HFCCertification/Schlumberger-Development-Certs/PHP/Schlumberger_Data_Encryption_Certificate.p12';
                $dataCertPwd ="xgWkY3uwSDX2JX1qyvi7";
           
                   $clientConfig = new \CardServices\CardServicesClientConfig();
                   $clientConfig->setServerProtocol($serverProtocol);
                   $clientConfig->setServerHost($serverHost);
                   $clientConfig->setServerPort($serverPort);
                   $clientConfig->setApikey($apiKey);
                   $clientConfig->setAuthCertFile($authCertFile);
                   $clientConfig->setAuthCertPwd($authCertPwd);
                   $clientConfig->setCaCertFile($caCertFile);
                   $clientConfig->setDataCertFile($dataCertFile);
                   $clientConfig->setDataCertPwd($dataCertPwd);
   
                   $client = new \CardServices\Client($clientConfig);
   
                       /*
                       * List the available organizations and select the first one for demo purposes.
                       */
                       $organization = $this->selectOrganization($client);
                       
                      // echo "\nUsing Organization: " . $organization->getName() . "\n";  
   
                       return $organization->getName();
            }

            function Exception_AuthCertFile_pathTest()
            {
      
                $serverProtocol = "https";
                $serverHost ="test.api.hfc.hidglobal.com";
                $serverPort =18443;
                $apiKey ='528DFB0B54B2438A5F631E94754BA4DA088E0EA1CF9700EF4ACE0B4C6D49F957';
                $authCertFile ='C:/HFCCertifications/Schlumberger-Development-Certs/PHP/Schlumberger_Client_API_Auth_Cert.pem';
           
                 $authCertPwd ="xgWkY3uwSDX2JX1qyvi7";
                $caCertFile ='C:/Users/subheg/Documents/subramanya/Fargo/Morris/Card_Services_CA_Chain.pem';
                $dataCertFile ='C:/HFCCertification/Schlumberger-Development-Certs/PHP/Schlumberger_Data_Encryption_Certificate.p12';
                $dataCertPwd ="xgWkY3uwSDX2JX1qyvi7";
           
                   $clientConfig = new \CardServices\CardServicesClientConfig();
                   $clientConfig->setServerProtocol($serverProtocol);
                   $clientConfig->setServerHost($serverHost);
                   $clientConfig->setServerPort($serverPort);
                   $clientConfig->setApikey($apiKey);
                   $clientConfig->setAuthCertFile($authCertFile);
                   $clientConfig->setAuthCertPwd($authCertPwd);
                   $clientConfig->setCaCertFile($caCertFile);
                   $clientConfig->setDataCertFile($dataCertFile);
                   $clientConfig->setDataCertPwd($dataCertPwd);
   
                   $client = new \CardServices\Client($clientConfig);
   
                       /*
                       * List the available organizations and select the first one for demo purposes.
                       */
                       $organization = $this->selectOrganization($client);
                       
                      // echo "\nUsing Organization: " . $organization->getName() . "\n";  
   
                       return $organization->getName();
            }

            function Exception_AuthCertPWD_Test()
            {
      
                $serverProtocol = "https";
                $serverHost ="test.api.hfc.hidglobal.com";
                $serverPort =18443;
                $apiKey ='528DFB0B54B2438A5F631E94754BA4DA088E0EA1CF9700EF4ACE0B4C6D49F957';
                $authCertFile ='C:/HFCCertification/Schlumberger-Development-Certs/PHP/Schlumberger_Client_API_Auth_Cert.pem';
           
                $authCertPwd =null;
                $caCertFile ='C:/Users/subheg/Documents/subramanya/Fargo/Morris/Card_Services_CA_Chain.pem';
                $dataCertFile ='C:/HFCCertification/Schlumberger-Development-Certs/PHP/Schlumberger_Data_Encryption_Certificate.p12';
                $dataCertPwd ="xgWkY3uwSDX2JX1qyvi7";
           
                   $clientConfig = new \CardServices\CardServicesClientConfig();
                   $clientConfig->setServerProtocol($serverProtocol);
                   $clientConfig->setServerHost($serverHost);
                   $clientConfig->setServerPort($serverPort);
                   $clientConfig->setApikey($apiKey);
                   $clientConfig->setAuthCertFile($authCertFile);
                   $clientConfig->setAuthCertPwd($authCertPwd);
                   $clientConfig->setCaCertFile($caCertFile);
                   $clientConfig->setDataCertFile($dataCertFile);
                   $clientConfig->setDataCertPwd($dataCertPwd);
   
                   $client = new \CardServices\Client($clientConfig);
   
                       /*
                       * List the available organizations and select the first one for demo purposes.
                       */
                       $organization = $this->selectOrganization($client);
                       
                      // echo "\nUsing Organization: " . $organization->getName() . "\n";  
   
                       return $organization->getName();
            }

            function Exception_CaCertFile_Test()
            {
      
                $serverProtocol = "https";
                $serverHost ="test.api.hfc.hidglobal.com";
                $serverPort =18443;
                $apiKey ='528DFB0B54B2438A5F631E94754BA4DA088E0EA1CF9700EF4ACE0B4C6D49F957';
                $authCertFile ='C:/HFCCertification/Schlumberger-Development-Certs/PHP/Schlumberger_Client_API_Auth_Cert.pem';
           
                $authCertPwd ="xgWkY3uwSDX2JX1qyvi7";
                $caCertFile =null;
                $dataCertFile ='C:/HFCCertification/Schlumberger-Development-Certs/PHP/Schlumberger_Data_Encryption_Certificate.p12';
                $dataCertPwd ="xgWkY3uwSDX2JX1qyvi7";
           
                   $clientConfig = new \CardServices\CardServicesClientConfig();
                   $clientConfig->setServerProtocol($serverProtocol);
                   $clientConfig->setServerHost($serverHost);
                   $clientConfig->setServerPort($serverPort);
                   $clientConfig->setApikey($apiKey);
                   $clientConfig->setAuthCertFile($authCertFile);
                   $clientConfig->setAuthCertPwd($authCertPwd);
                   $clientConfig->setCaCertFile($caCertFile);
                   $clientConfig->setDataCertFile($dataCertFile);
                   $clientConfig->setDataCertPwd($dataCertPwd);
   
                   $client = new \CardServices\Client($clientConfig);
   
                       /*
                       * List the available organizations and select the first one for demo purposes.
                       */
                       $organization = $this->selectOrganization($client);
                       
                      // echo "\nUsing Organization: " . $organization->getName() . "\n";  
   
                       return $organization->getName();
            }

            function Exception_CaCertFilePath_Test()
            {
      
                $serverProtocol = "https";
                $serverHost ="test.api.hfc.hidglobal.com";
                $serverPort =18443;
                $apiKey ='528DFB0B54B2438A5F631E94754BA4DA088E0EA1CF9700EF4ACE0B4C6D49F957';
                $authCertFile ='C:/HFCCertification/Schlumberger-Development-Certs/PHP/Schlumberger_Client_API_Auth_Cert.pem';
           
                $authCertPwd ="xgWkY3uwSDX2JX1qyvi7";
                $caCertFile ='C:/Userss/subheg/Documents/subramanya/Fargo/Morris/Card_Services_CA_Chain.pem';
                $dataCertFile ='C:/HFCCertification/Schlumberger-Development-Certs/PHP/Schlumberger_Data_Encryption_Certificate.p12';
                $dataCertPwd ="xgWkY3uwSDX2JX1qyvi7";
           
                   $clientConfig = new \CardServices\CardServicesClientConfig();
                   $clientConfig->setServerProtocol($serverProtocol);
                   $clientConfig->setServerHost($serverHost);
                   $clientConfig->setServerPort($serverPort);
                   $clientConfig->setApikey($apiKey);
                   $clientConfig->setAuthCertFile($authCertFile);
                   $clientConfig->setAuthCertPwd($authCertPwd);
                   $clientConfig->setCaCertFile($caCertFile);
                   $clientConfig->setDataCertFile($dataCertFile);
                   $clientConfig->setDataCertPwd($dataCertPwd);
   
                   $client = new \CardServices\Client($clientConfig);
   
                       /*
                       * List the available organizations and select the first one for demo purposes.
                       */
                       $organization = $this->selectOrganization($client);
                       
                      // echo "\nUsing Organization: " . $organization->getName() . "\n";  
   
                       return $organization->getName();
            }

            function Exception_dataCert_Test()
            {
      
                $serverProtocol = "https";
                $serverHost ="test.api.hfc.hidglobal.com";
                $serverPort =18443;
                $apiKey ='528DFB0B54B2438A5F631E94754BA4DA088E0EA1CF9700EF4ACE0B4C6D49F957';
                $authCertFile ='C:/HFCCertification/Schlumberger-Development-Certs/PHP/Schlumberger_Client_API_Auth_Cert.pem';
           
                $authCertPwd ="xgWkY3uwSDX2JX1qyvi7";
                $caCertFile ='C:/Users/subheg/Documents/subramanya/Fargo/Morris/Card_Services_CA_Chain.pem';
                $dataCertFile =null;
                $dataCertPwd ="xgWkY3uwSDX2JX1qyvi7";
           
                   $clientConfig = new \CardServices\CardServicesClientConfig();
                   $clientConfig->setServerProtocol($serverProtocol);
                   $clientConfig->setServerHost($serverHost);
                   $clientConfig->setServerPort($serverPort);
                   $clientConfig->setApikey($apiKey);
                   $clientConfig->setAuthCertFile($authCertFile);
                   $clientConfig->setAuthCertPwd($authCertPwd);
                   $clientConfig->setCaCertFile($caCertFile);
                   $clientConfig->setDataCertFile($dataCertFile);
                   $clientConfig->setDataCertPwd($dataCertPwd);
   
                   $client = new \CardServices\Client($clientConfig);
   
                       /*
                       * List the available organizations and select the first one for demo purposes.
                       */
                       $organization = $this->selectOrganization($client);
                       
                      // echo "\nUsing Organization: " . $organization->getName() . "\n";  
   
                       return $organization->getName();
            }

            function Exception_DataCertFilePath_Test()
            {
      
                $serverProtocol = "https";
                $serverHost ="test.api.hfc.hidglobal.com";
                $serverPort =18443;
                $apiKey ='528DFB0B54B2438A5F631E94754BA4DA088E0EA1CF9700EF4ACE0B4C6D49F957';
                $authCertFile ='C:/HFCCertification/Schlumberger-Development-Certs/PHP/Schlumberger_Client_API_Auth_Cert.pem';
           
                $authCertPwd ="xgWkY3uwSDX2JX1qyvi7";
                $caCertFile ='C:/Users/subheg/Documents/subramanya/Fargo/Morris/Card_Services_CA_Chain.pem';
                $dataCertFile ='C:/HFCCertifications/Schlumberger-Development-Certs/PHP/Schlumberger_Data_Encryption_Certificate.p12';
                $dataCertPwd ="xgWkY3uwSDX2JX1qyvi7";
           
                   $clientConfig = new \CardServices\CardServicesClientConfig();
                   $clientConfig->setServerProtocol($serverProtocol);
                   $clientConfig->setServerHost($serverHost);
                   $clientConfig->setServerPort($serverPort);
                   $clientConfig->setApikey($apiKey);
                   $clientConfig->setAuthCertFile($authCertFile);
                   $clientConfig->setAuthCertPwd($authCertPwd);
                   $clientConfig->setCaCertFile($caCertFile);
                   $clientConfig->setDataCertFile($dataCertFile);
                   $clientConfig->setDataCertPwd($dataCertPwd);
   
                   $client = new \CardServices\Client($clientConfig);
   
                       /*
                       * List the available organizations and select the first one for demo purposes.
                       */
                       $organization = $this->selectOrganization($client);
                       
                      // echo "\nUsing Organization: " . $organization->getName() . "\n";  
   
                       return $organization->getName();
            }

            function Exception_DataCertPWD_Test()
            {
      
                $serverProtocol = "https";
                $serverHost ="test.api.hfc.hidglobal.com";
                $serverPort =18443;
                $apiKey ='528DFB0B54B2438A5F631E94754BA4DA088E0EA1CF9700EF4ACE0B4C6D49F957';
                $authCertFile ='C:/HFCCertification/Schlumberger-Development-Certs/PHP/Schlumberger_Client_API_Auth_Cert.pem';
           
                $authCertPwd ="xgWkY3uwSDX2JX1qyvi7";
                $caCertFile ='C:/Users/subheg/Documents/subramanya/Fargo/Morris/Card_Services_CA_Chain.pem';
                $dataCertFile ='C:/HFCCertification/Schlumberger-Development-Certs/PHP/Schlumberger_Data_Encryption_Certificate.p12';
                $dataCertPwd =null;
           
                   $clientConfig = new \CardServices\CardServicesClientConfig();
                   $clientConfig->setServerProtocol($serverProtocol);
                   $clientConfig->setServerHost($serverHost);
                   $clientConfig->setServerPort($serverPort);
                   $clientConfig->setApikey($apiKey);
                   $clientConfig->setAuthCertFile($authCertFile);
                   $clientConfig->setAuthCertPwd($authCertPwd);
                   $clientConfig->setCaCertFile($caCertFile);
                   $clientConfig->setDataCertFile($dataCertFile);
                   $clientConfig->setDataCertPwd($dataCertPwd);
   
                   $client = new \CardServices\Client($clientConfig);
   
                       /*
                       * List the available organizations and select the first one for demo purposes.
                       */
                       $organization = $this->selectOrganization($client);
                       
                      // echo "\nUsing Organization: " . $organization->getName() . "\n";  
   
                       return $organization->getName();
            }
 }