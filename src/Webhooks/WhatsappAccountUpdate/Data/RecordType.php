<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\WhatsappAccountUpdate\Data;

enum RecordType: string
{
    case EVENT = 'event';
}
