<?php

declare(strict_types=1);

namespace Telnyx\Reports\MdrUsageReports\MdrUsageReportCreateParams;

enum AggregationType: string
{
    case NO_AGGREGATION = 'NO_AGGREGATION';

    case PROFILE = 'PROFILE';

    case TAGS = 'TAGS';
}
