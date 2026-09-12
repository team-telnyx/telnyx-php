<?php

declare(strict_types=1);

namespace Telnyx\Messages\MessagingInboundMessagePayload;

/**
 * The messaging channel used for the message.
 */
enum Type: string
{
    case SMS = 'SMS';

    case MMS = 'MMS';

    case WHATSAPP = 'WHATSAPP';
}
