<?php

declare(strict_types=1);

namespace Telnyx\MeetingSessions\MeetingSession;

/**
 * Current state of the assistant, or null if no assistant is attached.
 */
enum AssistantState: string
{
    case STARTING = 'starting';

    case CONNECTED = 'connected';

    case FAILED = 'failed';

    case ENDED = 'ended';
}
