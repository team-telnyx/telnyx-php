<?php

declare(strict_types=1);

namespace Telnyx\Messages\MessageGetResponse\Data\MessagingInboundMessagePayload\From;

enum Status: string
{
    case RECEIVED = 'received';

    case DELIVERED = 'delivered';
}
