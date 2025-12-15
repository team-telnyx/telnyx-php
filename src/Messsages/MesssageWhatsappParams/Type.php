<?php

declare(strict_types=1);

namespace Telnyx\Messsages\MesssageWhatsappParams;

/**
 * Message type - must be set to "WHATSAPP".
 */
enum Type: string
{
    case WHATSAPP = 'WHATSAPP';
}
