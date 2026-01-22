<?php

declare(strict_types=1);

namespace Telnyx\CredentialConnections\CredentialConnection\NoiseSuppressionDetails;

/**
 * The noise suppression engine to use. 'denoiser' is the default engine. 'deep_filter_net' and 'deep_filter_net_large' are alternative engines with different performance characteristics. Krisp engines ('krisp_viva_tel', 'krisp_viva_tel_lite', 'krisp_viva_promodel', 'krisp_viva_ss') provide advanced noise suppression capabilities.
 */
enum Engine: string
{
    case DENOISER = 'denoiser';

    case DEEP_FILTER_NET = 'deep_filter_net';

    case DEEP_FILTER_NET_LARGE = 'deep_filter_net_large';

    case KRISP_VIVA_TEL = 'krisp_viva_tel';

    case KRISP_VIVA_TEL_LITE = 'krisp_viva_tel_lite';

    case KRISP_VIVA_PROMODEL = 'krisp_viva_promodel';

    case KRISP_VIVA_SS = 'krisp_viva_ss';
}
