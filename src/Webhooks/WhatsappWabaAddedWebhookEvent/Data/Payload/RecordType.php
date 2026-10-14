<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\WhatsappWabaAddedWebhookEvent\Data\Payload;

enum RecordType: string
{
    case WABA_ACCOUNT_ADDED = 'waba_account_added';
}
