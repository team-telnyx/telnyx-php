<?php

declare(strict_types=1);

namespace Telnyx\MessagingProfiles\MessagingProfileRetrieveMetricsParams;

/**
 * The time frame for metrics.
 */
enum TimeFrame: string
{
    case _1_H = '1h';

    case _3_H = '3h';

    case _24_H = '24h';

    case _3_D = '3d';

    case _7_D = '7d';

    case _30_D = '30d';
}
