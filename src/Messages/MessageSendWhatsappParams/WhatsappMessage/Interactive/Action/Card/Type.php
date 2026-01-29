<?php

declare(strict_types=1);

namespace Telnyx\Messages\MessageSendWhatsappParams\WhatsappMessage\Interactive\Action\Card;

enum Type: string
{
    case CTA_URL = 'cta_url';
}
