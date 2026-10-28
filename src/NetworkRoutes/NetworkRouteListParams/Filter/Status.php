<?php

declare(strict_types=1);

namespace Telnyx\NetworkRoutes\NetworkRouteListParams\Filter;

/**
 * Only routes with this status.
 */
enum Status: string
{
    case PENDING = 'pending';

    case ACTIVE = 'active';

    case INACTIVE = 'inactive';

    case FAILED = 'failed';
}
