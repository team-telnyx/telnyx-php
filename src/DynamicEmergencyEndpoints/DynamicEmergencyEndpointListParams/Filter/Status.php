<?php

declare(strict_types=1);

namespace Telnyx\DynamicEmergencyEndpoints\DynamicEmergencyEndpointListParams\Filter;

/**
 * Filter by status.
 */
enum Status: string
{
    case PENDING = 'pending';

    case ACTIVATED = 'activated';

    case REJECTED = 'rejected';
}
