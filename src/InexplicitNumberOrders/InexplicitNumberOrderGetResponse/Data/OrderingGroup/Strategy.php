<?php

declare(strict_types=1);

namespace Telnyx\InexplicitNumberOrders\InexplicitNumberOrderGetResponse\Data\OrderingGroup;

/**
 * Ordering strategy used.
 */
enum Strategy: string
{
    case ALWAYS = 'always';

    case NEVER = 'never';
}
