<?php

declare(strict_types=1);

namespace Telnyx\InexplicitNumberOrders\InexplicitNumberOrderListResponse\Data\OrderingGroup;

/**
 * Ordering strategy used.
 */
enum Strategy: string
{
    case ALWAYS = 'always';

    case NEVER = 'never';
}
