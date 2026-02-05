<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallHangup\Payload;

/**
 * State received from a command.
 */
enum State: string
{
    case HANGUP = 'hangup';
}
