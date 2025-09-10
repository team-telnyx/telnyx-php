<?php

declare(strict_types=1);

namespace Telnyx\Calls;

/**
 * Specifies which call legs should receive the bidirectional stream audio.
 */
enum StreamBidirectionalTargetLegs: string
{
    case BOTH = 'both';

    case SELF = 'self';

    case OPPOSITE = 'opposite';
}
