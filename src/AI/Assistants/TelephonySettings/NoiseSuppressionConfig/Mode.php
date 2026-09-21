<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\TelephonySettings\NoiseSuppressionConfig;

/**
 * Mode for noise suppression configuration. Only applicable when noise_suppression is 'deepfilternet'.
 */
enum Mode: string
{
    case ADVANCED = 'advanced';
}
