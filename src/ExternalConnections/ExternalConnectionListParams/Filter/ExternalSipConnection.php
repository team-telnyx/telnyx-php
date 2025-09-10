<?php

declare(strict_types=1);

namespace Telnyx\ExternalConnections\ExternalConnectionListParams\Filter;

/**
 * If present, connections with <code>external_sip_connection</code> matching the given value will be returned.
 */
enum ExternalSipConnection: string
{
    case ZOOM = 'zoom';

    case OPERATOR_CONNECT = 'operator_connect';
}
