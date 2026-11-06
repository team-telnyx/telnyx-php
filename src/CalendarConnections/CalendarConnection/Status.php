<?php

declare(strict_types=1);

namespace Telnyx\CalendarConnections\CalendarConnection;

/**
 * Connection status.
 */
enum Status: string
{
    case CONNECTED = 'connected';

    case DISCONNECTED = 'disconnected';

    case ERROR = 'error';
}
