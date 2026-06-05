<?php

declare(strict_types=1);

namespace Telnyx\Enterprises\Dir\DirListParams;

/**
 * Sort field. Allowed: `created_at`, `updated_at`, `display_name`, `status`, `submitted_at`, `verified_at`, `expiring_at`. Prefix with `-` for descending. Default `-created_at`.
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

    case SUBMITTED_AT = 'submitted_at';

    case MINUSSUBMITTED_AT = '-submitted_at';

    case VERIFIED_AT = 'verified_at';

    case MINUSVERIFIED_AT = '-verified_at';

    case EXPIRING_AT = 'expiring_at';

    case MINUSEXPIRING_AT = '-expiring_at';
}
