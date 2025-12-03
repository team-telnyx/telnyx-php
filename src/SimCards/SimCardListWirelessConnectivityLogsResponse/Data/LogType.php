<?php

declare(strict_types=1);

namespace Telnyx\SimCards\SimCardListWirelessConnectivityLogsResponse\Data;

/**
 * The type of the session, 'registration' being the initial authentication session and 'data' the actual data transfer sessions.
 */
enum LogType: string
{
    case REGISTRATION = 'registration';

    case DATA = 'data';
}
