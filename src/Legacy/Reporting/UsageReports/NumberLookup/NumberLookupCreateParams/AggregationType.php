<?php

declare(strict_types=1);

namespace Telnyx\Legacy\Reporting\UsageReports\NumberLookup\NumberLookupCreateParams;

/**
 * Type of aggregation for the report.
 */
enum AggregationType: string
{
    case ALL = 'ALL';

    case BY_ORGANIZATION_MEMBER = 'BY_ORGANIZATION_MEMBER';
}
