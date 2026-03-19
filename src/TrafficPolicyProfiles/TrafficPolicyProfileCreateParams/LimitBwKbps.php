<?php

declare(strict_types=1);

namespace Telnyx\TrafficPolicyProfiles\TrafficPolicyProfileCreateParams;

/**
 * Bandwidth limit in kbps. Must be 512 or 1024.
 */
enum LimitBwKbps: int
{
    case _512 = 512;

    case _1024 = 1024;
}
