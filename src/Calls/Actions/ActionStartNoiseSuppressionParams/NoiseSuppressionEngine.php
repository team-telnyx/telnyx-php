<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\ActionStartNoiseSuppressionParams;

/**
 * The engine to use for noise suppression.
 * For backward compatibility, engines A and B are also supported, but are deprecated:
 *  A - Denoiser
 *  B - DeepFilterNet.
 */
enum NoiseSuppressionEngine: string
{
    case DENOISER = 'Denoiser';

    case DEEP_FILTER_NET = 'DeepFilterNet';
}
