<?php

declare(strict_types=1);

namespace Telnyx\IPConnections\OutboundIP;

/**
 * Specifies when we apply your ani_override setting. Only applies when ani_override is not blank.
 */
enum AniOverrideType: string
{
    case ALWAYS = 'always';

    case NORMAL = 'normal';

    case EMERGENCY = 'emergency';
}
