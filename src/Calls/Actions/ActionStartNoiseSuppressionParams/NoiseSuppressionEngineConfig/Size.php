<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\ActionStartNoiseSuppressionParams\NoiseSuppressionEngineConfig;

/**
 * AiCoustics model size. 's' and 'l' work with both families. 'xs' and 'xxs' are sparrow-only. 'vf_l' and 'vf_1_1_l' are quail-only. Only applicable for AiCoustics.
 */
enum Size: string
{
    case S = 's';

    case L = 'l';

    case XS = 'xs';

    case XXS = 'xxs';

    case VF_L = 'vf_l';

    case VF_1_1_L = 'vf_1_1_l';
}
