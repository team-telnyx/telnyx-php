<?php

declare(strict_types=1);

namespace Telnyx\AI\Integrations\Integration;

enum Status: string
{
    case DISCONNECTED = 'disconnected';

    case CONNECTED = 'connected';
}
