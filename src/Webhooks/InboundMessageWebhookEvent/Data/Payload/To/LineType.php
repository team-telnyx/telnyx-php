<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\InboundMessageWebhookEvent\Data\Payload\To;

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

    case LINE_TYPE_ = '';
}
