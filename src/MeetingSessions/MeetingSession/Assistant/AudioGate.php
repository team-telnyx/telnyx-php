<?php

declare(strict_types=1);

namespace Telnyx\MeetingSessions\MeetingSession\Assistant;

/**
 * Audio gating strategy for the assistant call leg.
 */
enum AudioGate: string
{
    case NONE = 'none';

    case HALF_DUPLEX = 'half_duplex';
}
