<?php

declare(strict_types=1);

namespace Telnyx\ManagedAccounts\ManagedAccount;

/**
 * Identifies the type of the resource.
 */
enum RecordType: string
{
    case MANAGED_ACCOUNT = 'managed_account';
}
