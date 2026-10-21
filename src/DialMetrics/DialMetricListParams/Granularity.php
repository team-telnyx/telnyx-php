<?php

declare(strict_types=1);

namespace Telnyx\DialMetrics\DialMetricListParams;

/**
 * Bucket size. `second` returns 5-second buckets (the finest resolution) and is kept for the last 48 hours. `minute` and `hour` are kept for the last 30 days.
 */
enum Granularity: string
{
    case SECOND = 'second';

    case MINUTE = 'minute';

    case HOUR = 'hour';
}
