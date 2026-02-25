<?php

declare(strict_types=1);

namespace Telnyx\Payment\PaymentNewStoredPaymentTransactionResponse\Data;

enum RecordType: string
{
    case TRANSACTION = 'transaction';
}
