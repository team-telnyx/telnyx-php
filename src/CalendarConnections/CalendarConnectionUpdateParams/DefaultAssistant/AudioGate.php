<?php

declare(strict_types=1);

namespace Telnyx\CalendarConnections\CalendarConnectionUpdateParams\DefaultAssistant;

/**
 * Use full_duplex (default) to allow participants to interrupt, or half_duplex to pause listening while the assistant speaks. Full-duplex pricing depends on participant audio usage; see the Meeting pricing guide.
 */
enum AudioGate: string
{
    case HALF_DUPLEX = 'half_duplex';

    case FULL_DUPLEX = 'full_duplex';
}
