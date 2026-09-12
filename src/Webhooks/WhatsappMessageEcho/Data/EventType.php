<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\WhatsappMessageEcho\Data;

enum EventType: string
{
    case MESSAGE_ECHO = 'message.echo';
}
