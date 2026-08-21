<?php

declare(strict_types=1);

namespace Telnyx\SubNumberOrders\NumbersSubNumberOrder;

/**
 * The status of the order.
 */
enum Status: string
{
    case PENDING = 'pending';

    case SUCCESS = 'success';

    case FAILURE = 'failure';
}
