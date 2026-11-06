<?php

declare(strict_types=1);

namespace Telnyx\MeetingSessions\MeetingSessionRecordingExport;

enum Status: string
{
    case PENDING = 'pending';

    case EXPORTED = 'exported';

    case FAILED = 'failed';
}
