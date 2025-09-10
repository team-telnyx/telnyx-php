<?php

declare(strict_types=1);

namespace Telnyx\IPConnections\IPConnectionUpdateParams;

/**
 * One of UDP, TLS, or TCP. Applies only to connections with IP authentication or FQDN authentication.
 */
enum TransportProtocol: string
{
    case UDP = 'UDP';

    case TCP = 'TCP';

    case TLS = 'TLS';
}
