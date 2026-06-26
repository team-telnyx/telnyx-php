<?php

declare(strict_types=1);

namespace Telnyx\Dir\PhoneNumberBatches\PhoneNumberBatchListParams;

/**
 * Restrict to batches whose aggregate status equals this value.
 */
enum FilterStatus: string
{
    case SUBMITTED = 'submitted';

    case IN_REVIEW = 'in_review';

    case VERIFIED = 'verified';

    case UNSUCCESSFUL = 'unsuccessful';

    case SUSPENDED = 'suspended';

    case EXPIRED = 'expired';

    case PERMANENTLY_REJECTED = 'permanently_rejected';
}
