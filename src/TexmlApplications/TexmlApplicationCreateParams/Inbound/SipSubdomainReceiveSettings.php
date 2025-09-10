<?php

declare(strict_types=1);

namespace Telnyx\TexmlApplications\TexmlApplicationCreateParams\Inbound;

/**
 * This option can be enabled to receive calls from: "Anyone" (any SIP endpoint in the public Internet) or "Only my connections" (any connection assigned to the same Telnyx user).
 */
enum SipSubdomainReceiveSettings: string
{
    case ONLY_MY_CONNECTIONS = 'only_my_connections';

    case FROM_ANYONE = 'from_anyone';
}
