<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\ActionStartNoiseSuppressionParams;

/**
 * The engine to use for noise suppression.
 * A - rnnoise engine
 * B - deepfilter engine.
 */
enum NoiseSuppressionEngine: string
{
    case A = 'A';

    case B = 'B';
}
