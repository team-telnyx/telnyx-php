<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallBridged;

/**
 * The type of event being delivered.
 */
enum EventType: string
{
    case CALL_BRIDGED = 'call.bridged';
}
