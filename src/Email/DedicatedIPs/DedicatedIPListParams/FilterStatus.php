<?php

declare(strict_types=1);

namespace Telnyx\Email\DedicatedIPs\DedicatedIPListParams;

/**
 * Return only IPs in this lifecycle status (exact match). Any other value returns an empty list. An empty value applies no filter.
 */
enum FilterStatus: string
{
    case PROVISIONING = 'provisioning';

    case WARMING_UP = 'warming_up';

    case ACTIVE = 'active';

    case SUSPENDED = 'suspended';

    case RELEASED = 'released';
}
