<?php

declare(strict_types=1);

namespace Telnyx\Dir\PhoneNumberBatches\PhoneNumberBatchGetResponse\Data;

/**
 * Aggregate batch status. Mirrors the values used on individual phone numbers (`submitted`, `in_review`, `verified`, `unsuccessful`, `permanently_rejected`, etc.).
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
