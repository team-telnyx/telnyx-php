<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\WhatsappAccountUpdate\Data;

enum EventType: string
{
    case WHATSAPP_ACCOUNT_UPDATE = 'whatsapp.account.update';
}
