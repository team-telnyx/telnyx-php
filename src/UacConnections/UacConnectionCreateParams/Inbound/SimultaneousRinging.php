<?php

declare(strict_types=1);

namespace Telnyx\UacConnections\UacConnectionCreateParams\Inbound;

/**
 * When enabled, allows multiple devices to ring simultaneously on incoming calls.
 */
enum SimultaneousRinging: string
{
    case DISABLED = 'disabled';

    case ENABLED = 'enabled';
}
