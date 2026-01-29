<?php

declare(strict_types=1);

namespace Telnyx\Organizations\Users\UserGetGroupsReportResponse\Data;

/**
 * The status of the account.
 */
enum UserStatus: string
{
    case ENABLED = 'enabled';

    case DISABLED = 'disabled';

    case BLOCKED = 'blocked';
}
