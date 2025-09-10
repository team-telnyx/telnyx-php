<?php

declare(strict_types=1);

namespace Telnyx\Messages\OutboundMessagePayload\To;

/**
 * The delivery status of the message.
 */
enum Status: string
{
    case QUEUED = 'queued';

    case SENDING = 'sending';

    case SENT = 'sent';

    case EXPIRED = 'expired';

    case SENDING_FAILED = 'sending_failed';

    case DELIVERY_UNCONFIRMED = 'delivery_unconfirmed';

    case DELIVERED = 'delivered';

    case DELIVERY_FAILED = 'delivery_failed';
}
