<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\AssociatedPhoneNumbers\PortingAssociatedPhoneNumber;

/**
 * Specifies the action to take with this phone number during partial porting.
 */
enum Action: string
{
    case KEEP = 'keep';

    case DISCONNECT = 'disconnect';
}
