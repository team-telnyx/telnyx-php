<?php

declare(strict_types=1);

namespace Telnyx\TrafficPolicyProfiles\TrafficPolicyProfileCreateParams;

/**
 * Bandwidth limit in kbps. Must be 512 or 1024.
 */
enum LimitBwKbps: int
{
    case LIMIT_BW_KBPS_512 = 512;

    case LIMIT_BW_KBPS_1024 = 1024;
}
