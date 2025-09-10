<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\AssociatedPhoneNumbers\AssociatedPhoneNumberListParams\Filter;

/**
 * Filter results by action type.
 */
enum Action: string
{
    case KEEP = 'keep';

    case DISCONNECT = 'disconnect';
}
