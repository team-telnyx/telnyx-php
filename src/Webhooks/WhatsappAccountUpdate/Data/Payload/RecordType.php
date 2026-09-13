<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\WhatsappAccountUpdate\Data\Payload;

enum RecordType: string
{
    case WHATSAPP_ACCOUNT = 'whatsapp_account';
}
