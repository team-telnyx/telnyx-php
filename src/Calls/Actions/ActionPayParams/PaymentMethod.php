<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\ActionPayParams;

/**
 * Payment method to collect.
 */
enum PaymentMethod: string
{
    case CREDIT_CARD = 'credit-card';

    case ACH_DEBIT = 'ach-debit';
}
