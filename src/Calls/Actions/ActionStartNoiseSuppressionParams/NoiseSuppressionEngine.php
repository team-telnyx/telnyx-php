<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\ActionStartNoiseSuppressionParams;

/**
 * The engine to use for noise suppression.
 * For backward compatibility, engines A, B, and C are also supported, but are deprecated:
 *  A - Denoiser
 *  B - DeepFilterNet
 *  C - Krisp.
 */
enum NoiseSuppressionEngine: string
{
    case DENOISER = 'Denoiser';

    case DEEP_FILTER_NET = 'DeepFilterNet';

    case KRISP = 'Krisp';
}
