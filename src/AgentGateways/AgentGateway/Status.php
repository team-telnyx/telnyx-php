<?php

declare(strict_types=1);

namespace Telnyx\AgentGateways\AgentGateway;

/**
 * Where the instance is in its lifecycle. `pending`: created and waiting to start. `provisioning`: starting. `ready`: running, with its `gateway_url` set. `failed`: did not start in time; delete it. `deleting`: being removed.
 */
enum Status: string
{
    case PENDING = 'pending';

    case PROVISIONING = 'provisioning';

    case READY = 'ready';

    case FAILED = 'failed';

    case DELETING = 'deleting';
}
