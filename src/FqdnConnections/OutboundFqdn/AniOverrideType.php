<?php

declare(strict_types=1);

namespace Telnyx\FqdnConnections\OutboundFqdn;

/**
 * Specifies when we should apply your ani_override setting. Only applies when ani_override is not blank.
 */
enum AniOverrideType: string
{
    case ALWAYS = 'always';

    case NORMAL = 'normal';

    case EMERGENCY = 'emergency';
}
