<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\InboundMessage;

enum Status: string
{
    case RECEIVED = 'received';
}
