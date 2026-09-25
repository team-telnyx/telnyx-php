<?php

declare(strict_types=1);

namespace Telnyx\PrivateWirelessGateways\PrivateWirelessGatewayCreateParams;

/**
 * Determines how IP addresses are assigned to SIM cards using this gateway. With static, each SIM card gets a fixed IP address from the gateway's IP range that is preserved across sessions. With dynamic, an IP address is assigned by the network at attach time and may change between sessions. If omitted, the gateway is created with the default address mode, dynamic.
 */
enum AddressMode: string
{
    case STATIC = 'static';

    case DYNAMIC = 'dynamic';
}
