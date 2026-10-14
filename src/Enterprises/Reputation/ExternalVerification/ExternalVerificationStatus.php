<?php

declare(strict_types=1);

namespace Telnyx\Enterprises\Reputation\ExternalVerification;

/**
 * Review state of the ownership proof that allows adding phone numbers hosted with another provider.
 */
enum ExternalVerificationStatus: string
{
    case PENDING = 'pending';

    case APPROVED = 'approved';

    case REJECTED = 'rejected';
}
