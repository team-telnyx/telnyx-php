<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\WhatsappMessageEcho\Data;

enum RecordType: string
{
    case EVENT = 'event';
}
