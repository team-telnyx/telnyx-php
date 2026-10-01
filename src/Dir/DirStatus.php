<?php

declare(strict_types=1);

namespace Telnyx\Dir;

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
 * - `delete_requested` - you have requested deletion; the DIR still exists and Telnyx is completing the removal (de-registration and cleanup). A verified DIR keeps serving its branded identity, and keeps billing, until the removal finishes.
 */
enum DirStatus: string
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

    case DELETE_REQUESTED = 'delete_requested';
}
