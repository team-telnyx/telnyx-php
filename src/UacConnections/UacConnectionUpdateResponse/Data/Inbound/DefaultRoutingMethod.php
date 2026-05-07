<?php

declare(strict_types=1);

namespace Telnyx\UacConnections\UacConnectionUpdateResponse\Data\Inbound;

/**
 * Default routing method to be used when a number is associated with the connection. Must be one of the routing method types or left blank, other values are not allowed.
 */
enum DefaultRoutingMethod: string
{
    case SEQUENTIAL = 'sequential';

    case ROUND_ROBIN = 'round-robin';
}
