<?php

declare(strict_types=1);

namespace Telnyx\X402\CreditAccount\Payments\TransactionRecord;

/**
 * The settlement status of the transaction. x402 transactions are created after successful on-chain settlement, so the status is `settled`.
 */
enum Status: string
{
    case SETTLED = 'settled';
}
