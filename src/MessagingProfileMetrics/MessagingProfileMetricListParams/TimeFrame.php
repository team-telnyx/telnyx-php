<?php

declare(strict_types=1);

namespace Telnyx\MessagingProfileMetrics\MessagingProfileMetricListParams;

/**
 * The time frame for metrics.
 */
enum TimeFrame: string
{
    case _1H = '1h';

    case _3H = '3h';

    case _24H = '24h';

    case _3D = '3d';

    case _7D = '7d';

    case _30D = '30d';
}
