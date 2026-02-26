<?php

declare(strict_types=1);

namespace Telnyx\Organizations\Users\OrganizationUser;

/**
 * The status of the account.
 */
enum UserStatus: string
{
    case ENABLED = 'enabled';

    case DISABLED = 'disabled';

    case BLOCKED = 'blocked';
}
