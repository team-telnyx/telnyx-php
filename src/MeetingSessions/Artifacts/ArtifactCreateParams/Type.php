<?php

declare(strict_types=1);

namespace Telnyx\MeetingSessions\Artifacts\ArtifactCreateParams;

/**
 * Type of artifact to generate from the session.
 */
enum Type: string
{
    case SUMMARY = 'summary';

    case ACTION_ITEMS = 'action_items';
}
