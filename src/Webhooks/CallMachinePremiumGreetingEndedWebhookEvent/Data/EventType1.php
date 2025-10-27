<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallMachinePremiumGreetingEndedWebhookEvent\Data;

/**
 * The type of event being delivered.
 */
enum EventType: string
{
    case CALL_MACHINE_PREMIUM_GREETING_ENDED = 'call.machine.premium.greeting.ended';
}
