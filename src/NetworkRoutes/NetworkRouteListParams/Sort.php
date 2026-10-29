<?php

declare(strict_types=1);

namespace Telnyx\NetworkRoutes\NetworkRouteListParams;

/**
 * Sorts the results by a field, ascending, or descending with a leading `-`. The default is `-created_at`.
 */
enum Sort: string
{
    case CIDR = 'cidr';

    case MINUS_CIDR = '-cidr';

    case STATUS = 'status';

    case STATUS_DESC = '-status';

    case CREATED_AT = 'created_at';

    case CREATED_AT_DESC = '-created_at';
}
