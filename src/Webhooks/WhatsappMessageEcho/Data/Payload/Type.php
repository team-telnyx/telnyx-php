<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\WhatsappMessageEcho\Data\Payload;

enum Type: string
{
    case WHATSAPP = 'WHATSAPP';
}
