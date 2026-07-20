<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\InboundMessage;

enum Direction: string
{
    case INBOUND = 'inbound';
}
