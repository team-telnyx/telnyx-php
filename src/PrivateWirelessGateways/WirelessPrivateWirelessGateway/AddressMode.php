<?php

declare(strict_types=1);

namespace Telnyx\PrivateWirelessGateways\WirelessPrivateWirelessGateway;

/**
 * The address mode of the private wireless gateway. With static, each SIM card gets a fixed IP address from the gateway's IP range that is preserved across sessions. With dynamic, IP addresses are assigned by the network at attach time and may change between sessions.
 */
enum AddressMode: string
{
    case STATIC = 'static';

    case DYNAMIC = 'dynamic';
}
