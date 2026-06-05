<?php

declare(strict_types=1);

namespace Telnyx\Dir\DirListParams;

/**
 * Sort field. Allowed values: `created_at`, `updated_at`, `display_name`, `status`. Prefix with `-` for descending. Default `-created_at`.
 */
enum Sort: string
{
    case CREATED_AT = 'created_at';

    case CREATED_AT_DESC = '-created_at';

    case UPDATED_AT = 'updated_at';

    case UPDATED_AT_DESC = '-updated_at';

    case DISPLAY_NAME = 'display_name';

    case MINUSDISPLAY_NAME = '-display_name';

    case STATUS = 'status';

    case STATUS_DESC = '-status';
}
