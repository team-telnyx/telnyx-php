<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\ActionStartNoiseSuppressionParams\NoiseSuppressionEngineConfig;

/**
 * Processing mode. Only applicable for DeepFilterNet.
 */
enum Mode: string
{
    case STANDARD = 'standard';

    case ADVANCED = 'advanced';
}
