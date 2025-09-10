<?php

declare(strict_types=1);

namespace Telnyx\Wireless\DetailRecordsReports\WdrReport;

/**
 * Indicates the status of the report, which is updated asynchronously.
 */
enum Status: string
{
    case PENDING = 'pending';

    case COMPLETE = 'complete';

    case FAILED = 'failed';

    case DELETED = 'deleted';
}
