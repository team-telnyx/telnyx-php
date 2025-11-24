<?php

declare(strict_types=1);

namespace Telnyx\InexplicitNumberOrders\InexplicitNumberOrderCreateParams\OrderingGroup;

/**
 * Ordering strategy. Define what action should be taken if we don't have enough phone numbers to fulfill your request. Allowable values are: always = proceed with ordering phone numbers, regardless of current inventory levels; never = do not place any orders unless there are enough phone numbers to satisfy the request. If not specified, the always strategy will be enforced.
 */
enum Strategy: string
{
    case ALWAYS = 'always';

    case NEVER = 'never';
}
