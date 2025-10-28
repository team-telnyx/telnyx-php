<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\ActionTransferParams;

/**
 * Defines the SIP region to be used for the call.
 */
enum SipRegion: string
{
    case US = 'US';

    case EUROPE = 'Europe';

    case CANADA = 'Canada';

    case AUSTRALIA = 'Australia';

    case MIDDLE_EAST = 'Middle East';
}
