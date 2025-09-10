<?php

declare(strict_types=1);

namespace Telnyx\IPConnections\InboundIP;

/**
 * Selects which `sip_region` to receive inbound calls from. If null, the default region (US) will be used.
 */
enum SipRegion: string
{
    case US = 'US';

    case EUROPE = 'Europe';

    case AUSTRALIA = 'Australia';
}
