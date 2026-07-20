<?php

declare(strict_types=1);

namespace Telnyx\Storage\Cloudfs\CloudfListParams;

/**
 * Sort order for the results: a field name for ascending, or the field name prefixed with `-` for descending.
 */
enum Sort: string
{
    case CREATED_AT = 'created_at';

    case CREATED_AT_DESC = '-created_at';

    case UPDATED_AT = 'updated_at';

    case UPDATED_AT_DESC = '-updated_at';

    case NAME = 'name';

    case NAME_DESC = '-name';
}
