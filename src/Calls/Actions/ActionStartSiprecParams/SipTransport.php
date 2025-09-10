<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\ActionStartSiprecParams;

/**
 * Specifies SIP transport protocol.
 */
enum SipTransport: string
{
    case UDP = 'udp';

    case TCP = 'tcp';

    case TLS = 'tls';
}
