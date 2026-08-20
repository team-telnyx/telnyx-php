<?php

declare(strict_types=1);

namespace Telnyx\Messages\MessagingInboundMessagePayload\From;

enum Status: string
{
    case RECEIVED = 'received';

    case DELIVERED = 'delivered';
}
