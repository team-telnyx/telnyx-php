<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\ActionRequirements\ActionRequirementListParams\Filter;

/**
 * Filter action requirements by status.
 */
enum Status: string
{
    case CREATED = 'created';

    case PENDING = 'pending';

    case COMPLETED = 'completed';

    case CANCELLED = 'cancelled';

    case FAILED = 'failed';
}
