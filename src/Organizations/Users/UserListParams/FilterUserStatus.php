<?php

declare(strict_types=1);

namespace Telnyx\Organizations\Users\UserListParams;

/**
 * Filter by user status.
 */
enum FilterUserStatus: string
{
    case ENABLED = 'enabled';

    case DISABLED = 'disabled';

    case BLOCKED = 'blocked';
}
