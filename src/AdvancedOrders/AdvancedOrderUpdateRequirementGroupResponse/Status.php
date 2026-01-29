<?php

declare(strict_types=1);

namespace Telnyx\AdvancedOrders\AdvancedOrderUpdateRequirementGroupResponse;

enum Status: string
{
    case PENDING = 'pending';

    case PROCESSING = 'processing';

    case ORDERED = 'ordered';
}
