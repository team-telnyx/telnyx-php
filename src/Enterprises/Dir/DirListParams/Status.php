<?php

declare(strict_types=1);

namespace Telnyx\Enterprises\Dir\DirListParams;

/**
 * Filter by DIR status.
 */
enum Status: string
{
    case DRAFT = 'draft';

    case SUBMITTED = 'submitted';

    case IN_REVIEW = 'in_review';

    case VERIFIED = 'verified';

    case REJECTED = 'rejected';

    case UNSUCCESSFUL = 'unsuccessful';

    case SUSPENDED = 'suspended';

    case EXPIRED = 'expired';

    case INFRINGEMENT_CLAIMED = 'infringement_claimed';

    case PERMANENTLY_REJECTED = 'permanently_rejected';
}
