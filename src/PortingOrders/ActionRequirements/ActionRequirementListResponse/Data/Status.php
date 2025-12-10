<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\ActionRequirements\ActionRequirementListResponse\Data;

/**
 * Current status of the action requirement.
 */
enum Status: string
{
    case CREATED = 'created';

    case PENDING = 'pending';

    case COMPLETED = 'completed';

    case CANCELLED = 'cancelled';

    case FAILED = 'failed';
}
