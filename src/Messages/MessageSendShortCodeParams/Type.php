<?php

declare(strict_types=1);

namespace Telnyx\Messages\MessageSendShortCodeParams;

/**
 * The protocol for sending the message, either SMS or MMS.
 */
enum Type: string
{
    case SMS = 'SMS';

    case MMS = 'MMS';
}
