<?php

declare(strict_types=1);

namespace Telnyx\AdvancedOrders\AdvancedOrderNewResponse;

enum Status: string
{
    case PENDING = 'pending';

    case PROCESSING = 'processing';

    case ORDERED = 'ordered';
}
