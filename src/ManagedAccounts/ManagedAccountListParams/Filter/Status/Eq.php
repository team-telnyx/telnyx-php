<?php

declare(strict_types=1);

namespace Telnyx\ManagedAccounts\ManagedAccountListParams\Filter\Status;

/**
 * If present, only returns managed accounts with the <code>status</code> matching exactly the value given. Use <code>enabled</code> or <code>disabled</code> to filter accounts by whether they are currently able to use Telnyx services.
 */
enum Eq: string
{
    case ALL = 'all';

    case ACTIVE = 'active';

    case ENABLED = 'enabled';

    case CANCELLED = 'cancelled';

    case DISABLED = 'disabled';

    case BLOCKED = 'blocked';
}
