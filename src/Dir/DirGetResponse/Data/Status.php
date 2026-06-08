<?php

declare(strict_types=1);

namespace Telnyx\Dir\DirGetResponse\Data;

/**
 * DIR lifecycle status.
 * - `draft` - newly created; editable; not yet submitted.
 * - `submitted` / `in_review` - Telnyx is reviewing.
 * - `verified` - approved; phone numbers may be attached.
 * - `rejected` - Telnyx rejected this submission; `rejection_reasons` is populated; customer can edit and resubmit.
 * - `unsuccessful` - system-side error during processing; customer can edit and resubmit.
 * - `suspended` - temporarily disabled (e.g. by an active infringement claim).
 * - `expired` - verification expired; customer must resubmit.
 * - `infringement_claimed` - a trademark/impersonation claim is open against this DIR.
 * - `permanently_rejected` - terminal; cannot be resubmitted.
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
