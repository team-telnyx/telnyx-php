<?php

declare(strict_types=1);

namespace Telnyx\MeetingSessions\MeetingSessionCreateParams\Assistant;

/**
 * Audio gating strategy for the assistant call leg. `half_duplex` (default) sends the assistant a single mixed meeting stream and mutes it while the assistant speaks, so the assistant cannot hear itself and cannot be interrupted. `full_duplex` sends a separate stream per participant, which allows barge-in and removes self-hearing, and COSTS SIGNIFICANTLY MORE: per-participant streams multiply the per-minute cost by the number of participants.
 */
enum AudioGate: string
{
    case HALF_DUPLEX = 'half_duplex';

    case FULL_DUPLEX = 'full_duplex';
}
