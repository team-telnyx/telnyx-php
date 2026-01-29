<?php

declare(strict_types=1);

namespace Telnyx\Messages\OutboundMessagePayload\Cc;

enum Status: string
{
    case QUEUED = 'queued';

    case SENDING = 'sending';

    case SENT = 'sent';

    case DELIVERED = 'delivered';

    case SENDING_FAILED = 'sending_failed';

    case DELIVERY_FAILED = 'delivery_failed';

    case DELIVERY_UNCONFIRMED = 'delivery_unconfirmed';
}
