<?php

declare(strict_types=1);

namespace Telnyx\Tunnels\Tunnel;

/**
 * `inactive` when no tunnel process is connected, and `healthy` when one or more are. `degraded` (Preview, not reported yet) when a process is connected but fails to reach its destinations.
 */
enum Status: string
{
    case INACTIVE = 'inactive';

    case HEALTHY = 'healthy';

    case DEGRADED = 'degraded';
}
