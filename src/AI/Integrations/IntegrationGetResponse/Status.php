<?php

declare(strict_types=1);

namespace Telnyx\AI\Integrations\IntegrationGetResponse;

enum Status: string
{
    case DISCONNECTED = 'disconnected';

    case CONNECTED = 'connected';
}
