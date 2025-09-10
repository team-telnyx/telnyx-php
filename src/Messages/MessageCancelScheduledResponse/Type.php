<?php

declare(strict_types=1);

namespace Telnyx\Messages\MessageCancelScheduledResponse;

/**
 * The type of message.
 */
enum Type: string
{
    case SMS = 'SMS';

    case MMS = 'MMS';
}
