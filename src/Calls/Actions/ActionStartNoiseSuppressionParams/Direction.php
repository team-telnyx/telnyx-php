<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\ActionStartNoiseSuppressionParams;

/**
 * The direction of the audio stream to be noise suppressed.
 */
enum Direction: string
{
    case INBOUND = 'inbound';

    case OUTBOUND = 'outbound';

    case BOTH = 'both';
}
