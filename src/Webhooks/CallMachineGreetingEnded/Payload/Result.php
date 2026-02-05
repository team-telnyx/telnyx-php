<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallMachineGreetingEnded\Payload;

/**
 * Answering machine greeting ended result.
 */
enum Result: string
{
    case BEEP_DETECTED = 'beep_detected';

    case ENDED = 'ended';

    case NOT_SURE = 'not_sure';
}
