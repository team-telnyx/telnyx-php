<?php

declare(strict_types=1);

namespace Telnyx\MachinePayments\MachinePaymentAccountCreditResponse\Data;

/**
 * Payment method used by the provider: `stripe_spt` for Stripe Shared Payment Token payments, `tempo_usdc` for Tempo USDC payments.
 */
enum PaymentMethod: string
{
    case STRIPE_SPT = 'stripe_spt';

    case TEMPO_USDC = 'tempo_usdc';
}
