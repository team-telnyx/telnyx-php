<?php

declare(strict_types=1);

namespace Telnyx\Messages\MessageGetResponse\Data\InboundMessagePayload\From;

/**
 * The line-type of the sender.
 */
enum LineType: string
{
    case WIRELINE = 'Wireline';

    case WIRELESS = 'Wireless';

    case VO_WI_FI = 'VoWiFi';

    case VO_IP = 'VoIP';

    case PRE_PAID_WIRELESS = 'Pre-Paid Wireless';

    case EMPTY = '';
}
