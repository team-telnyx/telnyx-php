<?php

declare(strict_types=1);

namespace Telnyx\LedgerBillingGroupReports\LedgerBillingGroupReport;

/**
 * Identifies the type of the resource.
 */
enum RecordType: string
{
    case LEDGER_BILLING_GROUP_REPORT = 'ledger_billing_group_report';
}
