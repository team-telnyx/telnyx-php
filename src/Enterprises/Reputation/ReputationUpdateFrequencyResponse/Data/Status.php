<?php

declare(strict_types=1);

namespace Telnyx\Enterprises\Reputation\ReputationUpdateFrequencyResponse\Data;

/**
 * Current enrollment status.
 */
enum Status: string
{
    case PENDING = 'pending';

    case APPROVED = 'approved';

    case REJECTED = 'rejected';

    case DELETED = 'deleted';
}
