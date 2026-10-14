<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallMachinePremiumGreetingEnded\Payload;

/**
 * Premium Answering Machine Greeting Ended result. `prompt_ended` is only sent when `answering_machine_detection` is `premium_ios_call_screening_detection` and the iOS call-screening prompt ends without a beep.
 */
enum Result: string
{
    case BEEP_DETECTED = 'beep_detected';

    case NO_BEEP_DETECTED = 'no_beep_detected';

    case PROMPT_ENDED = 'prompt_ended';
}
