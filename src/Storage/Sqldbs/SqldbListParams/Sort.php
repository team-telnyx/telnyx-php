<?php

declare(strict_types=1);

namespace Telnyx\Storage\Sqldbs\SqldbListParams;

/**
 * Sort field; prefix with `-` for descending order.
 */
enum Sort: string
{
    case NAME = 'name';

    case NAME_DESC = '-name';

    case STATUS = 'status';

    case STATUS_DESC = '-status';

    case CREATED_AT = 'created_at';

    case CREATED_AT_DESC = '-created_at';
}
