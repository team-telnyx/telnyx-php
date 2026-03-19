<?php

declare(strict_types=1);

namespace Telnyx\TrafficPolicyProfiles\TrafficPolicyProfileUpdateParams;

/**
 * Bandwidth limit in kbps. Must be 512 or 1024, or null to remove.
 */
enum LimitBwKbps: int
{
    case _512 = 512;

    case _1024 = 1024;
}
