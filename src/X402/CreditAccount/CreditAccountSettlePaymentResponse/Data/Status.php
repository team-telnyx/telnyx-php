<?php

declare(strict_types=1);

namespace Telnyx\X402\CreditAccount\CreditAccountSettlePaymentResponse\Data;

/**
 * The settlement status of the transaction.
 */
enum Status: string
{
    case SETTLED = 'settled';
}
