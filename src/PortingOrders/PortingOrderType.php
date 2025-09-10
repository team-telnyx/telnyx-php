<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders;

/**
 * A port can be either 'full' or 'partial'. When type is 'full' the other attributes should be omitted.
 */
enum PortingOrderType: string
{
    case FULL = 'full';

    case PARTIAL = 'partial';
}
