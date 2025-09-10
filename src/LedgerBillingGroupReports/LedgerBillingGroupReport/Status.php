<?php

declare(strict_types=1);

namespace Telnyx\LedgerBillingGroupReports\LedgerBillingGroupReport;

/**
 * Status of the ledger billing group report.
 */
enum Status: string
{
    case PENDING = 'pending';

    case COMPLETE = 'complete';

    case FAILED = 'failed';

    case DELETED = 'deleted';
}
