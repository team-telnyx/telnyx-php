<?php

declare(strict_types=1);

namespace Telnyx\CalendarConnections\MeetingSessionAssistant;

/**
 * Audio gating strategy in force for the assistant call leg.
 */
enum AudioGate: string
{
    case HALF_DUPLEX = 'half_duplex';

    case FULL_DUPLEX = 'full_duplex';
}
