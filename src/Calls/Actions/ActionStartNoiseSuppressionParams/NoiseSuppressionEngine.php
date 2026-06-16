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

    case AIC_L_QUAIL = 'aic_l_quail';

    case AIC_L_ROOK = 'aic_l_rook';

    case AIC_S_QUAIL = 'aic_s_quail';

    case AIC_S_ROOK = 'aic_s_rook';

    case QUAIL_VOICE_FOCUS_S = 'quail_voice_focus_s';

    case QUAIL_VOICE_FOCUS_XS = 'quail_voice_focus_xs';
}
