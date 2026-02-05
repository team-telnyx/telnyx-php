<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallGatherEnded;

/**
 * The type of event being delivered.
 */
enum EventType: string
{
    case CALL_GATHER_ENDED = 'call.gather.ended';
}
