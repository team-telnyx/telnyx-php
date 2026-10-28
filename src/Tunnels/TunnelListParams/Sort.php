<?php

declare(strict_types=1);

namespace Telnyx\Tunnels\TunnelListParams;

/**
 * Sorts the results by a field, ascending, or descending with a leading `-`. The default is `-created_at`.
 */
enum Sort: string
{
    case NAME = 'name';

    case NAME_DESC = '-name';

    case STATUS = 'status';

    case STATUS_DESC = '-status';

    case CREATED_AT = 'created_at';

    case CREATED_AT_DESC = '-created_at';

    case UPDATED_AT = 'updated_at';

    case UPDATED_AT_DESC = '-updated_at';
}
