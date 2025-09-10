<?php

declare(strict_types=1);

namespace Telnyx\ManagedAccounts\ManagedAccountBalance;

/**
 * Identifies the type of the resource.
 */
enum RecordType: string
{
    case BALANCE = 'balance';
}
