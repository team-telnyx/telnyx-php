<?php

declare(strict_types=1);

namespace Telnyx\Tunnels\TunnelListParams\Filter;

/**
 * The status of the tunnel.
 */
enum Status: string
{
    case INACTIVE = 'inactive';

    case HEALTHY = 'healthy';

    case DEGRADED = 'degraded';
}
