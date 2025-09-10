<?php

declare(strict_types=1);

namespace Telnyx\SimCards\SimCardListParams;

/**
 * Sorts SIM cards by the given field. Defaults to ascending order unless field is prefixed with a minus sign.
 */
enum Sort: string
{
    case CURRENT_BILLING_PERIOD_CONSUMED_DATA_AMOUNT = 'current_billing_period_consumed_data.amount';
}
