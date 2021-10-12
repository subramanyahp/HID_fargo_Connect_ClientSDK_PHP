<?php
/**
 * HID FARGO Connect - Cloud Card Issuance Solution
 * Copyright (c) 2016-2020. eXtensia Technologies, All rights reserved
 */

namespace CardServices;

/**
 * Constants for use with the Job status property to indicate the
 * current status of a submitted job.
 *
 * @package CardServices
 */
class JobStatus
{
    /**
     * Job submitted and awaiting processing
     */
    const Submitted = "Submitted";

    /**
     * Job printed successfully
     */
    const Printed = "Printed";

    /**
     * Job processing failed
     */
    const Failed = "Failed";

    /**
     * Job has been deleted
     */
    const Deleted = "Deleted";
}