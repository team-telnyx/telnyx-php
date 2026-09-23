<?php

declare(strict_types=1);

namespace Telnyx\MachinePayments\MachinePaymentAccountCreditResponse\Data;

/**
 * Payment source identifier distinguishing machine payments from other account-credit sources.
 */
enum PaymentSource: string
{
    case MACHINE_PAYMENT = 'machine_payment';
}
