<?php

declare(strict_types=1);

namespace Telnyx\ExternalConnections\ExternalConnectionCreateParams;

/**
 * The service that will be consuming this connection.
 */
enum ExternalSipConnection: string
{
    case ZOOM = 'zoom';
}
