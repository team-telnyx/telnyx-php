<?php

declare(strict_types=1);

namespace Telnyx\IPConnections\OutboundIP;

enum IPAuthenticationMethod: string
{
    case TECH_PREFIXP_CHARGE_INFO = 'tech-prefixp-charge-info';

    case TOKEN = 'token';
}
