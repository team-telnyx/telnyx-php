<?php

declare(strict_types=1);

namespace Telnyx\X402\CreditAccount\CreditAccountSettleResponse\Data;

/**
 * The settlement status of the transaction.
 */
enum Status: string
{
    case SETTLED = 'settled';
}
