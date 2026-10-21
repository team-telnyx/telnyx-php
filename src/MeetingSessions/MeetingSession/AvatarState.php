<?php

declare(strict_types=1);

namespace Telnyx\MeetingSessions\MeetingSession;

/**
 * Current state of the avatar, or null if the session has no avatar. `starting` until the avatar's video is playing, then `connected`; `degraded` when the session has fallen back to voice-only (the `avatar.degraded` event carries the reason); `disconnected` when the avatar has ended.
 */
enum AvatarState: string
{
    case STARTING = 'starting';

    case CONNECTED = 'connected';

    case DEGRADED = 'degraded';

    case DISCONNECTED = 'disconnected';
}
