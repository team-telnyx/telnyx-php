<?php

declare(strict_types=1);

namespace Telnyx\MeetingSessions\MeetingSessionCreateParams\Assistant;

/**
 * Use half_duplex (default) to pause listening while the assistant speaks, or full_duplex to allow participants to interrupt. Full-duplex pricing depends on participant audio usage; see the Meeting pricing guide.
 */
enum AudioGate: string
{
    case HALF_DUPLEX = 'half_duplex';

    case FULL_DUPLEX = 'full_duplex';
}
