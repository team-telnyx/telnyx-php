<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\InboundMessageWebhookEvent\Data\Payload\From;

enum Status: string
{
    case RECEIVED = 'received';

    case DELIVERED = 'delivered';
}
