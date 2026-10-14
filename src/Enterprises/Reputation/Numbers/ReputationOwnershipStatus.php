<?php

declare(strict_types=1);

namespace Telnyx\Enterprises\Reputation\Numbers;

/**
 * Result of ongoing ownership checks. `verified`: the number is with the carrier on record. `pending_confirmation`: the number's carrier changed, or a periodic ownership re-verification is due; confirm you still own it before `confirm_by`. `flagged`: a periodic re-verification went unanswered; the number stays monitored and is not removed, but confirm ownership (`POST .../ownership_confirm`) to return it to `verified`. `removed`: the number is no longer monitored; returned by `POST .../ownership_confirm` with `still_own: false`, and when listing numbers with `filter[ownership_status]=removed`.
 */
enum ReputationOwnershipStatus: string
{
    case VERIFIED = 'verified';

    case FLAGGED = 'flagged';

    case PENDING_CONFIRMATION = 'pending_confirmation';

    case REMOVED = 'removed';
}
