<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\ActionStartNoiseSuppressionParams\NoiseSuppressionEngineConfig;

/**
 * The Krisp model to use. Only applicable for Krisp.
 */
enum Model: string
{
    case KRISP_VIVA_TEL_V2_KEF = 'krisp-viva-tel-v2.kef';

    case KRISP_VIVA_TEL_LITE_V1_KEF = 'krisp-viva-tel-lite-v1.kef';

    case KRISP_VIVA_PRO_V1_KEF = 'krisp-viva-pro-v1.kef';

    case KRISP_VIVA_SS_V1_KEF = 'krisp-viva-ss-v1.kef';
}
