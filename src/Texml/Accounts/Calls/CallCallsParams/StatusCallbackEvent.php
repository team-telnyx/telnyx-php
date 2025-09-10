<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Calls\CallCallsParams;

/**
 * The call events for which Telnyx should send a webhook. Multiple events can be defined when separated by a space.
 */
enum StatusCallbackEvent: string
{
    case INITIATED = 'initiated';

    case RINGING = 'ringing';

    case ANSWERED = 'answered';

    case COMPLETED = 'completed';
}
