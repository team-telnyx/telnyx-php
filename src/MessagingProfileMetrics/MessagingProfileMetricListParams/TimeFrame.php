<?php

declare(strict_types=1);

namespace Telnyx\MessagingProfileMetrics\MessagingProfileMetricListParams;

/**
 * The time frame for metrics.
 */
enum TimeFrame: string
{
    case TIME_FRAME_1_H = '1h';

    case TIME_FRAME_3_H = '3h';

    case TIME_FRAME_24_H = '24h';

    case TIME_FRAME_3_D = '3d';

    case TIME_FRAME_7_D = '7d';

    case TIME_FRAME_30_D = '30d';
}
