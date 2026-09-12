<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\WhatsappMessageEcho\Data\Payload;

enum RecordType: string
{
    case MESSAGE = 'message';
}
