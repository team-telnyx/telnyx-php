<?php

declare(strict_types=1);

namespace Telnyx\Messages\OutboundMessagePayload;

/**
 * The type of message.
 */
enum Type: string
{
    case SMS = 'SMS';

    case MMS = 'MMS';
}
