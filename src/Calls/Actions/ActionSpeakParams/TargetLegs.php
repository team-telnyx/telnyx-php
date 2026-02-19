<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\ActionSpeakParams;

/**
 * Specifies which legs of the call should receive the spoken audio.
 */
enum TargetLegs: string
{
    case SELF = 'self';

    case OPPOSITE = 'opposite';

    case BOTH = 'both';
}
