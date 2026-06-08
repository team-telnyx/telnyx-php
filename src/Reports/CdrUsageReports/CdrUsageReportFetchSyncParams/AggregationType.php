<?php

declare(strict_types=1);

namespace Telnyx\Reports\CdrUsageReports\CdrUsageReportFetchSyncParams;

/**
 * Type of aggregation to apply to the results.
 */
enum AggregationType: string
{
    case NO_AGGREGATION = 'NO_AGGREGATION';

    case CONNECTION = 'CONNECTION';

    case TAG = 'TAG';

    case BILLING_GROUP = 'BILLING_GROUP';
}
