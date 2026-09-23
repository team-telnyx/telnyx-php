<?php

declare(strict_types=1);

namespace Telnyx\MachinePayments\MachinePaymentAccountCreditResponse\Data;

/**
 * Record type identifier.
 */
enum RecordType: string
{
    case MACHINE_PAYMENT_ACCOUNT_CREDIT = 'machine_payment_account_credit';
}
