<?php

declare(strict_types=1);

namespace Telnyx\MachinePayments\MachinePaymentAccountCreditResponse\Data;

/**
 * Upstream payment provider that settled the payment.
 */
enum Provider: string
{
    case STRIPE = 'stripe';

    case TEMPO = 'tempo';
}
