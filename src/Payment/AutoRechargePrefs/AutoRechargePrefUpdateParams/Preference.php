<?php

declare(strict_types=1);

namespace Telnyx\Payment\AutoRechargePrefs\AutoRechargePrefUpdateParams;

/**
 * The payment preference for auto recharge.
 */
enum Preference: string
{
    case CREDIT_PAYPAL = 'credit_paypal';

    case ACH = 'ach';
}
