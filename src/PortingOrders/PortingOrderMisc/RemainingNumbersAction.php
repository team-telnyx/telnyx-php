<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\PortingOrderMisc;

/**
 * Remaining numbers can be either kept with their current service provider or disconnected. 'new_billing_telephone_number' is required when 'remaining_numbers_action' is 'keep'.
 */
enum RemainingNumbersAction: string
{
    case KEEP = 'keep';

    case DISCONNECT = 'disconnect';
}
