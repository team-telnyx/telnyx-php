<?php

declare(strict_types=1);

namespace Telnyx\IPConnections\IPConnectionCreateParams;

/**
 * Controls when noise suppression is applied to calls. When set to 'inbound', noise suppression is applied to incoming audio. When set to 'outbound', it's applied to outgoing audio. When set to 'both', it's applied in both directions. When set to 'disabled', noise suppression is turned off.
 */
enum NoiseSuppression: string
{
    case INBOUND = 'inbound';

    case OUTBOUND = 'outbound';

    case BOTH = 'both';

    case DISABLED = 'disabled';
}
