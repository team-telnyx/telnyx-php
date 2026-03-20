<?php

declare(strict_types=1);

namespace Telnyx\X402\CreditAccount\CreditAccountSettleResponse\Data;

enum RecordType: string
{
    case X402_TRANSACTION = 'x402_transaction';
}
