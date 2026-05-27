<?php

declare(strict_types=1);

namespace Telnyx\UacConnections\UacConnection;

/**
 * The authentication strategy used by this connection.
 */
enum Authentication: string
{
    case UAC_AUTHENTICATION = 'uac-authentication';
}
