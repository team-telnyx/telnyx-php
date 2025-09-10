<?php

declare(strict_types=1);

namespace Telnyx\ExternalConnections\ExternalConnection;

/**
 * The service that will be consuming this connection.
 */
enum ExternalSipConnection: string
{
    case ZOOM = 'zoom';

    case OPERATOR_CONNECT = 'operator_connect';
}
