<?php

declare(strict_types=1);

namespace Telnyx\Messages\MessageWhatsappParams;

/**
 * Message type - must be set to "WHATSAPP".
 */
enum Type: string
{
    case WHATSAPP = 'WHATSAPP';
}
