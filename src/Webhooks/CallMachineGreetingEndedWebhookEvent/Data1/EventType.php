<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallMachineGreetingEndedWebhookEvent\Data1;

/**
 * The type of event being delivered.
 */
enum EventType: string
{
    case CALL_MACHINE_GREETING_ENDED = 'call.machine.greeting.ended';
}
