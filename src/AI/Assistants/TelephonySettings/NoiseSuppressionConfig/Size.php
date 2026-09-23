<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\TelephonySettings\NoiseSuppressionConfig;

/**
 * AiCoustics model size. 'vf' tracks the latest model release; 'vf_2_0_l' is pinned to version 2.0 for consistent, predictable behavior. Only applicable when noise_suppression is 'aicoustics'.
 */
enum Size: string
{
    case VF = 'vf';

    case VF_2_0_L = 'vf_2_0_l';
}
