<?php

declare(strict_types=1);

namespace Telnyx\NumberOrders\PhoneNumber;

/**
 * The status of the phone number in the order.
 */
enum Status: string
{
    case PENDING = 'pending';

    case SUCCESS = 'success';

    case FAILURE = 'failure';
}
