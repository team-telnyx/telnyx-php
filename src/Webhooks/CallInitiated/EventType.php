<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallInitiated;

/**
 * The type of event being delivered.
 */
enum EventType: string
{
    case CALL_INITIATED = 'call.initiated';
}
