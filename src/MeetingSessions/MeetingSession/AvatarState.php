<?php

declare(strict_types=1);

namespace Telnyx\MeetingSessions\MeetingSession;

/**
 * Current state of the avatar connection, or null if no avatar is attached.
 */
enum AvatarState: string
{
    case STARTING = 'starting';

    case CONNECTED = 'connected';

    case DEGRADED = 'degraded';

    case DISCONNECTED = 'disconnected';
}
