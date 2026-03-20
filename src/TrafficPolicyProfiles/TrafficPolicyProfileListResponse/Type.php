<?php

declare(strict_types=1);

namespace Telnyx\TrafficPolicyProfiles\TrafficPolicyProfileListResponse;

/**
 * The type of the traffic policy profile.
 */
enum Type: string
{
    case WHITELIST = 'whitelist';

    case BLACKLIST = 'blacklist';

    case THROTTLING = 'throttling';
}
