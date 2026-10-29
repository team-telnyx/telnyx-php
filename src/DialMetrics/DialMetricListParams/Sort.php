<?php

declare(strict_types=1);

namespace Telnyx\DialMetrics\DialMetricListParams;

/**
 * Sort order of the buckets by `start_time`. `-start_time` (default) returns the newest first, `start_time` the oldest first. `region` follows the same direction for buckets with the same `start_time`. To read the live rate, use `granularity=second` and `sort=-start_time`, then take the first record of each `region`.
 */
enum Sort: string
{
    case MINUS_START_TIME = '-start_time';

    case START_TIME = 'start_time';
}
