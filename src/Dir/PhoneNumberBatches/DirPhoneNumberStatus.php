<?php

declare(strict_types=1);

namespace Telnyx\Dir\PhoneNumberBatches;

/**
 * Phone-number lifecycle status.
 * - `submitted` / `in_review` - Telnyx is reviewing the batch this number belongs to.
 * - `verified` - approved; the DIR's display identity will be shown on outbound calls from this number.
 * - `unsuccessful` - Telnyx rejected this submission; the customer may re-add to retry.
 * - `suspended` - temporarily disabled (e.g. by an active infringement claim on the DIR).
 * - `expired` - verification expired; re-add to renew.
 * - `permanently_rejected` - terminal; cannot be re-added on this or any other DIR you own.
 */
enum DirPhoneNumberStatus: string
{
    case SUBMITTED = 'submitted';

    case IN_REVIEW = 'in_review';

    case VERIFIED = 'verified';

    case UNSUCCESSFUL = 'unsuccessful';

    case SUSPENDED = 'suspended';

    case EXPIRED = 'expired';

    case PERMANENTLY_REJECTED = 'permanently_rejected';
}
