<?php

declare(strict_types=1);

namespace Telnyx\NumberBlockOrders\NumberBlockOrder;

/**
 * The status of the order.
 */
enum Status: string
{
    case PENDING = 'pending';

    case SUCCESS = 'success';

    case FAILURE = 'failure';
}
