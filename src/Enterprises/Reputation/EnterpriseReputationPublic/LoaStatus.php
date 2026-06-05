<?php

declare(strict_types=1);

namespace Telnyx\Enterprises\Reputation\EnterpriseReputationPublic;

/**
 * Customer-facing Letter-of-Authorization verification state. `approved` is required (alongside reputation status) before phone numbers can be added.
 */
enum LoaStatus: string
{
    case PENDING = 'pending';

    case APPROVED = 'approved';

    case REJECTED = 'rejected';
}
