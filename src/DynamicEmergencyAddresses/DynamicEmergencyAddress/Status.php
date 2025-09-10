<?php

declare(strict_types=1);

namespace Telnyx\DynamicEmergencyAddresses\DynamicEmergencyAddress;

/**
 * Status of dynamic emergency address.
 */
enum Status: string
{
    case PENDING = 'pending';

    case ACTIVATED = 'activated';

    case REJECTED = 'rejected';
}
