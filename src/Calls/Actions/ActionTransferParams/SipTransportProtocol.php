<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\ActionTransferParams;

/**
 * Defines SIP transport protocol to be used on the call.
 */
enum SipTransportProtocol: string
{
    case UDP = 'UDP';

    case TCP = 'TCP';

    case TLS = 'TLS';
}
