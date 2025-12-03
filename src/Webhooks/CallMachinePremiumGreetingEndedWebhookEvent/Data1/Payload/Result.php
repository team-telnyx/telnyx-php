<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallMachinePremiumGreetingEndedWebhookEvent\Data1\Payload;

/**
 * Premium Answering Machine Greeting Ended result.
 */
enum Result: string
{
    case BEEP_DETECTED = 'beep_detected';

    case NO_BEEP_DETECTED = 'no_beep_detected';
}
