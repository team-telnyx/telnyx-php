<?php

declare(strict_types=1);

namespace Telnyx\UacConnections\UacConnectionListResponse\Inbound;

/**
 * Controls which SIP URI callers may reach this connection.
 */
enum SipSubdomainReceiveSettings: string
{
    case ONLY_MY_CONNECTIONS = 'only_my_connections';

    case FROM_ANYONE = 'from_anyone';
}
