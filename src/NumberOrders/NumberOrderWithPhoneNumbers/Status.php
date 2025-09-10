<?php

declare(strict_types=1);

namespace Telnyx\NumberOrders\NumberOrderWithPhoneNumbers;

/**
 * The status of the order.
 */
enum Status: string
{
    case PENDING = 'pending';

    case SUCCESS = 'success';

    case FAILURE = 'failure';
}
