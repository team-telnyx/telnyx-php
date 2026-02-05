<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallHangup;

/**
 * The type of event being delivered.
 */
enum EventType: string
{
    case CALL_HANGUP = 'call.hangup';
}
