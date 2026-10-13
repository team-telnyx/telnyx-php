<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\WhatsappWabaAddedWebhookEvent\Data;

enum RecordType: string
{
    case EVENT = 'event';
}
