<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\WhatsappMessageEcho\Data\Payload;

/**
 * Indicates that the business sent the message to the WhatsApp user.
 */
enum Direction: string
{
    case OUTBOUND = 'outbound';
}
