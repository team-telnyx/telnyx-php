<?php

declare(strict_types=1);

namespace Telnyx\Messages\OutboundMessagePayload\Cc;

/**
 * The line-type of the receiver.
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
