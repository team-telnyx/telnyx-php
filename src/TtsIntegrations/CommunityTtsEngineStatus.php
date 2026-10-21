<?php

declare(strict_types=1);

namespace Telnyx\TtsIntegrations;

/**
 * Whether the engine can serve traffic right now, independent of `visibility` and `review_status`. `draft`: not yet approved (new and awaiting its first review, rejected and awaiting a fix, or approved earlier and awaiting re-review after a review-sensitive change). `active`: serving traffic. `disabled`: owner-paused, reversible via `enable`. `suspended`: paused by Telnyx (repeated failures of a public engine, or an abuse action); the owner cannot clear this by calling `enable`, and Telnyx can reinstate it.
 */
enum CommunityTtsEngineStatus: string
{
    case DRAFT = 'draft';

    case ACTIVE = 'active';

    case DISABLED = 'disabled';

    case SUSPENDED = 'suspended';
}
