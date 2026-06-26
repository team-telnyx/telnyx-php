<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\ScheduledEvents\ScheduledPhoneCallEventResponse\CallSettings;

/**
 * SIP region passed to Telnyx when initiating an outbound call. Values
 * match the Telnyx TeXML `SipRegion` parameter exactly. Telnyx defaults to
 * `US` when omitted.
 */
enum SipRegion: string
{
    case US = 'US';

    case EUROPE = 'Europe';

    case CANADA = 'Canada';

    case AUSTRALIA = 'Australia';

    case MIDDLE_EAST = 'Middle East';
}
