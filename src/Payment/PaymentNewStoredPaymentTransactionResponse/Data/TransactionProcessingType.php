<?php

declare(strict_types=1);

namespace Telnyx\Payment\PaymentNewStoredPaymentTransactionResponse\Data;

enum TransactionProcessingType: string
{
    case STORED_PAYMENT = 'stored_payment';
}
