<?php

declare(strict_types=1);

namespace Telnyx\TrafficPolicyProfiles\TrafficPolicyProfileListParams;

/**
 * Filter by traffic policy profile type.
 */
enum FilterType: string
{
    case WHITELIST = 'whitelist';

    case BLACKLIST = 'blacklist';

    case THROTTLING = 'throttling';
}
