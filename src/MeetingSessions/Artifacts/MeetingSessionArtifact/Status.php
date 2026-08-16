<?php

declare(strict_types=1);

namespace Telnyx\MeetingSessions\Artifacts\MeetingSessionArtifact;

enum Status: string
{
    case PENDING = 'pending';

    case COMPLETED = 'completed';

    case FAILED = 'failed';
}
