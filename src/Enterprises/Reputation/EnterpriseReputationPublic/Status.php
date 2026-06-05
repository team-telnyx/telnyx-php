<?php

declare(strict_types=1);

namespace Telnyx\Enterprises\Reputation\EnterpriseReputationPublic;

/**
 * Lifecycle status of the enterprise's Phone Number Reputation activation.
 */
enum Status: string
{
    case PENDING = 'pending';

    case APPROVED = 'approved';

    case DELETED = 'deleted';

    case REJECTED = 'rejected';
}
