<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\ActionStartNoiseSuppressionParams\NoiseSuppressionEngineConfig;

/**
 * AiCoustics model family. 'sparrow' optimized for human-to-human calls, 'quail' optimized for Voice AI/STT. Only applicable for AiCoustics.
 */
enum Family: string
{
    case SPARROW = 'sparrow';

    case QUAIL = 'quail';
}
