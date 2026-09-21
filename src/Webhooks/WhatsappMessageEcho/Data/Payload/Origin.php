<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\WhatsappMessageEcho\Data\Payload;

/**
 * Identifies the WhatsApp Business app as the source of the message.
 */
enum Origin: string
{
    case WHATSAPP_BUSINESS_APP = 'whatsapp_business_app';
}
