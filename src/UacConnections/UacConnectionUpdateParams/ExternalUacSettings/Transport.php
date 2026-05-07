<?php

declare(strict_types=1);

namespace Telnyx\UacConnections\UacConnectionUpdateParams\ExternalUacSettings;

/**
 * The transport protocol used for SIP signaling when communicating with the external SIP peer. One of UDP, TLS, or TCP.
 */
enum Transport: string
{
    case UDP = 'UDP';

    case TLS = 'TLS';

    case TCP = 'TCP';
}
