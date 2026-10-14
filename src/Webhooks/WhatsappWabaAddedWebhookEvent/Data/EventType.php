<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\WhatsappWabaAddedWebhookEvent\Data;

enum EventType: string
{
    case WHATSAPP_WABA_ADDED = 'whatsapp.waba_added';
}
