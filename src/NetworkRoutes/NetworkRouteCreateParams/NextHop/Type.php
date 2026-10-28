<?php

declare(strict_types=1);

namespace Telnyx\NetworkRoutes\NetworkRouteCreateParams\NextHop;

/**
 * The type of the next hop.
 */
enum Type: string
{
    case TUNNEL = 'tunnel';
}
