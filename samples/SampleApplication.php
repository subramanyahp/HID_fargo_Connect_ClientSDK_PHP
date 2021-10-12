<?php /** @noinspection ALL */

/**
 * HID FARGO Connect - Cloud Card Issuance Solution
 * Copyright (c) 2016-2020. eXtensia Technologies, All rights reserved
 *
 * FARGO Connect Card Services Client SDK sample application
 */

use CardServices\DataType;
use CardServices\PrinterOption;
use CardServices\ProfileParamConst;
use CardServices\ServiceType;

//require __DIR__ . '/../../../vendor/autoload.php';
require '../vendor/autoload.php';

include_once '../Client.php';
include_once '../DataType.php';
include_once '../ServiceType.php';
include_once '../PrinterOption.php';
include_once '../ProfileParamConst.php';
include_once '../ProductionProfileConfig.php';

//
// SDK configuration settings
//
// Note: The following settings must be configured before running the
// sample application. Please contact HID Global if the setting were
// not provided with the PHP SDK or if assistance is required.
//

/*
 * Server address settings
 */
$serverProtocol ="https";
$serverHost ="test.api.hfc.hidglobal.com";
$serverPort =18443;

/*
 * Server API key required for SDK access. The API key is provided
 * as a hexadecimal string.
 */
$apiKey ='528DFB0B54B2438A5F631E94754BA4DA088E0EA1CF9700EF4ACE0B4C6D49F957';
//$apiKey ='';

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

/*
 * Create and initialize the SDK configuration
 */
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

/*
 * Create the FARGO Connect SDK client instance
 */
$client = new \CardServices\Client($clientConfig);

/*
 * List the available organizations and select the first one for demo purposes.
 */
$organization = selectOrganization($client);

echo "\nUsing Organization: " . $organization->getName() . "\n";

/*
 * Show information about the selected organization and its devices
 */
showOrganizationinfo($client, $organization->getOrganizationId());

/*
 * List the available production profiles for the selected organization and select
 * the first production profile for demo purposes.
 */
$productionProfile = selectProductionProfile($client, $organization->getOrganizationId());

echo "\nUsing Production Profile: " . $productionProfile->getName() . "\n";

/*
 * List all the print destinations available for the selected organization and
 * select the first print destination for demo purposes.
 */
$printDestination = selectPrintDestination($client, $organization->getorganizationId());

echo "\nUsing Print Destination: " . $printDestination->getDestination() . "\n";

/*
 * Retrieve the configuration parameters for the selected production profile
 */
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
    echo "Available CardType Options:\n\n";

    foreach ($profileParam->getOptions() as $cardTypeName) {
        echo '  ' . $cardTypeName . "\n";
    }

    /*
     * Arbitrarily select the first card type for demo purposes. The supported card
     * types are normally known in advance and the Option property is used to validate
     * whether the desired card type is a valid option.
     */
    $availableCardTypes = $profileParam->getOptions();
    $selectedCardType = $availableCardTypes[0];

    echo "\nSelected CardType: " . $selectedCardType . "\n";
    $profileParam->setValue($selectedCardType);
}

/*
 * Configure the production profile to obtain a production request template for
 * the previously selected "CardType" value.
 */
echo "\nConfiguring the production request\n";
$RequestTemplate = $client->getProductionProfileApi()->configureProductionProfile($profileConfig);

/*
 * Iterate over the services in the production request template. By default,
 * only one card production service will be present in the request template.
 */
echo "\nConfiguring service parameters\n";
foreach ($RequestTemplate->getServices() as $service) {

    /*
     * Fail if an unexpected service type is present
     */
    if ($service->getType() != ServiceType::CardRequest) {
        throw new Exception("Unhandled production service type: " . $service->getType());
    }

    /*
     * Process the card production request parameters
     */
    foreach ($service->getParameters() as $dataParameter) {

        switch ($dataParameter->getDataType()) {

            case DataType::Text:
                /*
                 * Set the Text parameter value to the parameter's name for demo purposes.
                 * The text value would normally be supplied by the application.
                 */
                $dataParameter->setValue($dataParameter->getName());
                break;

            case DataType::Image:
                /*
                 * Set the Image parameter value to a test image for demo purposes. The
                 * image would normally be supplied by the application.
                 */
                $dataParameter->setValue('photos/image1.png');
                break;

            default:
                throw new Exception("Unexpected service data parameter: " . $dataParameter->getName());
        }
    }

    /*
     * Configure the print destination and job displayed on the console
     */
    $service->setDestination($printDestination->getDestination());
    $service->setRequestName("Test card request");

    /*
     * Advanced SDK feature: Override the printer input hopper selection configured in the
     * card template. The default is to use the input hopper selected in the card template
     * unless explicitly overridden by a job service option setting as shown here.
     */
    $service->addServiceOption(PrinterOption::InputHopperSelect, PrinterOption::UseHopper1);
}

/*
 * Submit the job to the server for processing. The return job Id is typically
 * stored by the application and used to monitor job status and retrieve
 * job results using JobApi methods.
 */
$jobId = $client->getJobApi()->submitRequest($RequestTemplate);
echo "\nJob Submitted Successfully with job Id: " . $jobId . "\n\n";

/*
 * Query the server for a list of jobs submitted within the last 24 hours
 */
showRecentJobs($client);

/*
 * Query the server for details of the submitted job. The job status will be "Submitted"
 * pending completion of job.
 */
showJobDetails($client, $jobId);


/**
 * Lists the available organizations and arbitrarily selects and returns the first
 * organization for demo purposes. Organization identifiers are designed to be stable
 * over time and can be stored and reused.
 * @param $client - Card services client
 * @return mixed - Selected organization
 */
function selectOrganization($client)
{
    $organizations = $client->getOrganizationApi()->listOrganizations();

    if (empty($organizations)) {
        throw new Exception("No organizations found");
    }

    echo "\nAvailable Organizations:\n\n";

    foreach ($organizations as $organization) {
        echo "  " . $organization->getOrganizationId() . " -> " . $organization->getName() . "\n";
    }

    /*
     * Selecting the first organization for demo purposes
     */
    return $organizations[0];
}

/**
 * Lists the organizational units and locations within the specified organization. The
 * organizational structure is loosely based on the X.500 directory model and has a fixed
 * three-tier hierarchy of Organization, Organizational Unit and Location. Devices are
 * defined at the Location level of the hierarchy. Organizational identifiers are designed
 * to be stable over time and can be stored and reused.
 * @param $client - Card services client
 * @param $organizationId - Organization unique Id
 */
function showOrganizationinfo($client, $organizationId)
{
    /*
     * Enumerate the organizational units within the organization
     */
    echo "\nOrganizational Units:\n\n";
    $organizationalunits = $client->getOrganizationApi()->listOrganizationalUnits($organizationId);

    foreach ($organizationalunits as $organizationalunit) {
        echo "  " . $organizationalunit->getOrganizationalUnitId() . " -> " . $organizationalunit->getname() . "\n";
    }

    echo "\nOrganization Locations:\n\n";

    $organizationLocations = $client->getOrganizationApi()->listOrganizationLocations($organizationId);

    foreach ($organizationLocations as $organizationLocation) {
        echo "  " . $organizationLocation->getLocationId() . " -> " . $organizationLocation->getLocationName() . "\n";
    }
}

/**
 * Lists the available production profiles for the given organization and arbitrarily
 * selects and returns the first production profile for demo purposes. Production
 * profile identifiers are designed to be stable over time and can be stored and reused.
 * @param $client - Card services client
 * @param $organizationId - Organization unique Id
 * @return mixed - Selected production profile
 */
function selectProductionProfile($client, $organizationId)
{
    $productionProfiles = $client->getProductionProfileApi()->listProductionProfiles($organizationId);

    if (empty($productionProfiles)) {
        throw new Exception("No production profiles found");
    }

    echo "\nAvailable Production Profiles:\n\n";

    foreach ($productionProfiles as $profile) {
        echo "  " . $profile->getProfileId() . " -> " . $profile->getName() . "\n";
    }

    /*
     * Selecting the first profile for demo purposes
     */
    return $productionProfiles[0];
}

/**
 * Lists the available print destinations for the given organization and arbitrarily
 * selects and returns the first print destination for demo purposes. Print destination
 * identifiers are designed to be stable over time and can be stored and reused.
 * @param $client - Card services client
 * @param $organizationId - Organization unique Id
 * @return mixed - Selected print destination
 */
function selectPrintDestination($client, $organizationId)
{
    $printDestinations = $client->getDeviceApi()->listPrintDestinationsForOrg($organizationId);

    if (empty($printDestinations)) {
        throw new Exception("No print destinations found");
    }

    echo "\nAvailable print destinations:\n\n";

    foreach ($printDestinations as $destination) {
        echo "  " . $destination->getDestination() . " -> " . $destination->getPrinterName() . "\n";
    }

    /*
     * Selecting the first print destination for demo purposes
     */
    return $printDestinations[0];
}

/**
 * Demonstrates querying the server for jobs submitted within on a defined look-back
 * period. This is useful for displaying recent job activity. The GetJobsForDateRange
 * method can be used for the same purpose, but provides additional flexibility.
 * @param $client
 */
function showRecentJobs($client)
{
   
    //$localTimeZone = new DateTimeZone('America/New_York');

    echo "\nJobs submitted in the last 24 hours:\n";
    $recentJobs = $client->getJobApi()->listJobsForTimePeriod(100, '24 hours');

    foreach ($recentJobs as $job) {
        /*
         * Adjust dates to the local timezone
         */
        $localTimeZone = new DateTimeZone('America/New_York');
        $job->getSubmitDate()->setTimeZone($localTimeZone);
        $job->getLastUpdate()->setTimeZone($localTimeZone);

        echo "Job Name: " . $job->getJobName() . " -> " . $job->getJobUniqueId() . "\n";
        echo "  Job Status......: " . $job->getJobStatus() . "\n";
        echo "  Status Message..: " . $job->getJobStatusMessage() . "\n";
        echo "  Submit Date.....: " . date_format($job->getSubmitDate(), DATE_ATOM) . "\n\n";
    }
}


/**
 * Queries the sever for the job corresponding to the specified unique job Id.
 * @param $client - Card services client
 * @param $jobUniqueId - Job unique Id returned during job submission
 */
function showJobDetails($client, $jobUniqueId)
{
    echo "Retrieving Job Details\n\n";

    /*
     * Adjust dates to the local timezone
     */
    $localTimeZone = new DateTimeZone('America/New_York');
    $jobDetails = $client->getJobApi()->getJob($jobUniqueId);
    $jobDetails->getSubmitDate()->setTimeZone($localTimeZone);
    $jobDetails->getLastUpdate()->setTimeZone($localTimeZone);

    echo "  Job Name........: " . $jobDetails->getJobName() . "\n";
    echo "  Unique Id.......: " . $jobDetails->getJobUniqueId() . "\n";
    echo "  Job Status......: " . $jobDetails->getJobStatus() . "\n";
    echo "  Status Message..: " . $jobDetails->getJobStatusMessage() . "\n";
    echo "  Date Submitted..: " . date_format($jobDetails->getSubmitDate(), 'Y-m-d H:i:s') . "\n";
    echo "  Last Updated....: " . date_format($jobDetails->getLastUpdate(), 'Y-m-d H:i:s') . "\n\n";

    /*
     * Show job results if the job printed successfully
     */
    if ($jobDetails->getJobStatus() == "Printed") {
        $cardReadResults = $jobDetails->getServiceData()->getCardReadresults();
        echo "  Number of Card Edges found: " . count($cardReadResults->getCardEdges()) . "\n\n";

        /*
         * Show the details for each of the card edges found. All card edges discovered
         * are returned. Card types enabled in the Card Read Service configuration in
         * the card template have an Enabled value of true.
         *
         * Note: Some card technologies such as HID_ICLASS support multiple frame protocols
         * and may be reported in the result more than once. The Card Serial Number and PACS
         * Data should be identical when this occurs.
         */
        foreach ($cardReadResults->getCardEdges() as $cardEdge) {
            echo "    Card Edge Type.......: " . $cardEdge->getEdgetype() . "\n";
            echo "    Card Protocol........: " . $cardEdge->getCardProtocol() . "\n";
            echo "    Card Edge Enabled....: " . ($cardEdge->getEnabled() ? 'Yes' : 'No') . "\n";
            echo "    Card Read Status.....: " . $cardEdge->getStatus() . "\n";
            echo "    Card Read Message....: " . $cardEdge->getStatusMessage() . "\n";
            echo "    card Serial Number...: " . $cardEdge->getCardSerialNumber() . "\n";
            echo "    PACS Data Available..: " . ($cardEdge->getPacsDataAvailable() ? 'Yes' : 'No') . "\n";

            /*
             * Display the card PACS bits and decoded PACS data for the card edge
             */
            if (boolval($cardEdge->getPacsDataAvailable()) == true) {
                echo "    PACS Bit Data........: " . $cardEdge->getCardPacsBitData() . "\n";
                echo "    PACS Bit Count.......: " . $cardEdge->getCardPacsBitCount() . "\n";

                /*
                 * Show the PACS decode results for each card format configured for this
                 * card edge in the card designer. The decoded PACS data is only valid
                 * when the DecodeStatus is "Success" (see PacsDecodeStatus constants for
                 * the supported values). The application developer must ensure the correct
                 * format(s) are configured in the card designer and provide appropriate
                 * format selection and error handling logic.
                 */
                foreach ($cardEdge->getPacsData() as $pacsDecodeResult) {
                    echo "\n";
                    echo "     Card Format........:" . $pacsDecodeResult->getFormatName() . "\n";
                    echo "     Format Bit Count...:" . $pacsDecodeResult->getFormatBitCount() . "\n";
                    echo "     Decode Status......:" . $pacsDecodeResult->getDecodeStatus() . "\n";
                    echo "     Status Message.....:" . $pacsDecodeResult->getStatusMessage() . "\n";
                    echo "     Card Number........:" . $pacsDecodeResult->getCardNumber() . "\n";
                    echo "     Pacs Data Fields" . "\n";

                    foreach ($pacsDecodeResult->getPacsFields() as $key => $value) {
                        echo "       " . $key . " -> " . $value . "\n";
                    }
                }
            }

            /*
             * Show additional key/value pairs returned for the card edge. This is
             * used to return ad-hoc data values such as card PACS fields values.
             */
            foreach ($cardEdge->getEdgeData() as $data) {
                echo "    Additional Data.......: " . "\n";
                print_r($data);
            }
            echo "\n";
        }
    }

    //
    //  Sample Output - Dual technology MIFARE/SEOS card
    //
    //  Job Name..............: Card Read Test
    //  Job Unique Id.........: JOBA5D31540B8AC4CCDB930FF914D9228D3
    //  Job Status............: Printed
    //  Status Message........: Job printed successfully
    //  Date Submitted........: 4/9/2018 3:31:28 PM
    //  Last Updated..........: 4/9/2018 3:34:22 PM
    //  Card Read Results.....: 2 Card Edge(s) Found
    //
    //    Card Edge Type......: MIFARE_CLASSIC
    //    Card Protocol.......: ISO14443A_3
    //    Card Edge Enabled...: Yes
    //    Card Read Status....: Success
    //    Card Read Message...: Card edge found and processed successfully
    //    Card Serial Number..: 088931D3
    //    PACS Data Available.: No
    //
    //    Card Edge Type......: SEOS
    //    Card Protocol.......: ISO14443A
    //    Card Edge Enabled...: Yes
    //    Card Read Status....: Success
    //    Card Read Message...: Card edge found and processed successfully
    //    Card Serial Number..: 08A62E6B
    //    PACS Data Available.: True
    //    PACS Bit Data.......: 0x1D682250
    //    PACS Bit Count......: 35
    //
    //      Card Format.......: H234561
    //      Format Bit Count..: 26
    //      Decode Status.....: Success
    //      Status Message....: Decode succeeded
    //      Card Number.......: 679123
    //      PACS Data Fields
    //        Facility Code-> 115
    //        Card Number -> 679123
}



