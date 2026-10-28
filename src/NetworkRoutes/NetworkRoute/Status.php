<?php

declare(strict_types=1);

namespace Telnyx\NetworkRoutes\NetworkRoute;

/**
 * `pending` until Telnyx installs the route on the Network, then `active`. `inactive` while a tunnel next hop has no connected process. `failed` (Preview, not reported yet) when Telnyx could not install the route.
 */
enum Status: string
{
    case PENDING = 'pending';

    case ACTIVE = 'active';

    case INACTIVE = 'inactive';

    case FAILED = 'failed';
}
