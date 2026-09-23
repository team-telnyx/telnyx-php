<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\TelephonySettings\NoiseSuppressionConfig;

/**
 * AiCoustics model family optimized for Voice AI and STT. Only applicable when noise_suppression is 'aicoustics'.
 */
enum Family: string
{
    case QUAIL = 'quail';
}
