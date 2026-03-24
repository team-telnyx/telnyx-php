<?php

declare(strict_types=1);

namespace Telnyx\TrafficPolicyProfiles\TrafficPolicyProfileUpdateParams;

/**
 * Bandwidth limit in kbps. Must be 512 or 1024, or null to remove.
 */
enum LimitBwKbps: int
{
    case LIMIT_BW_KBPS_512 = 512;

    case LIMIT_BW_KBPS_1024 = 1024;
}
