<?php

declare(strict_types=1);

namespace Telnyx\TtsIntegrations\CommunityTtsEngine;

/**
 * `null`: never submitted, or an approved engine whose review-sensitive field changed and awaits re-review. `pending`: submitted. `approved`: approved. `rejected`: rejected, with `review_notes`.
 */
enum ReviewStatus: string
{
    case PENDING = 'pending';

    case APPROVED = 'approved';

    case REJECTED = 'rejected';
}
