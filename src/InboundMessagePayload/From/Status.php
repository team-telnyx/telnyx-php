<?php

declare(strict_types=1);

namespace Telnyx\InboundMessagePayload\From;

enum Status: string
{
    case RECEIVED = 'received';

    case DELIVERED = 'delivered';
}
