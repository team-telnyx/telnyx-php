<?php

declare(strict_types=1);

namespace Telnyx\SimCards\SimCard;

/**
 * Indicates whether the device is actively connected to a network and able to run data.
 */
enum LiveDataSession: string
{
    case CONNECTED = 'connected';

    case DISCONNECTED = 'disconnected';

    case UNKNOWN = 'unknown';
}
