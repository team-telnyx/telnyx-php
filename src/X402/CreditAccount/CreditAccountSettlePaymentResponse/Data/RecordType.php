<?php

declare(strict_types=1);

namespace Telnyx\X402\CreditAccount\CreditAccountSettlePaymentResponse\Data;

enum RecordType: string
{
    case X402_TRANSACTION = 'x402_transaction';
}
