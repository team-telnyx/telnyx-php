<?php

declare(strict_types=1);

namespace Telnyx\Messages\WhatsappInteractive\Action\Card;

enum Type: string
{
    case CTA_URL = 'cta_url';
}
