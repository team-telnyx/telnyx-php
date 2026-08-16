<?php

declare(strict_types=1);

namespace Telnyx\MeetingSessions\Artifacts\MeetingSessionArtifact;

enum Type: string
{
    case SUMMARY = 'summary';

    case ACTION_ITEMS = 'action_items';
}
