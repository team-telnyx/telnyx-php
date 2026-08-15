<?php

declare(strict_types=1);

namespace Telnyx\MeetingSessions\MeetingSessionDeleteRecordingMediaResponse\Data;

enum DeletionStatus: string
{
    case REQUESTED = 'requested';

    case ALREADY_IN_PROGRESS = 'already_in_progress';
}
