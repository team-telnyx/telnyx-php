<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\ActionStartNoiseSuppressionParams;

/**
 * The engine to use for noise suppression.
 * For backward compatibility, engines A, B, C, and D are also supported, but are deprecated:
 *  A - Denoiser
 *  B - DeepFilterNet
 *  C - Krisp
 *  D - AiCoustics.
 */
enum NoiseSuppressionEngine: string
{
    case DENOISER = 'Denoiser';

    case DEEP_FILTER_NET = 'DeepFilterNet';

    case KRISP = 'Krisp';

    case AI_COUSTICS = 'AiCoustics';
}
