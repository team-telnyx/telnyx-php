<?php

declare(strict_types=1);

namespace Telnyx\Dir\PhoneNumbers\PhoneNumberListParams;

/**
 * Filter by phone-number status.
 */
enum Status: string
{
    case SUBMITTED = 'submitted';

    case IN_REVIEW = 'in_review';

    case VERIFIED = 'verified';

    case UNSUCCESSFUL = 'unsuccessful';

    case SUSPENDED = 'suspended';

    case EXPIRED = 'expired';

    case PERMANENTLY_REJECTED = 'permanently_rejected';
}
