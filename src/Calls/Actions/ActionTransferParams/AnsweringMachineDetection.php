<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\ActionTransferParams;

/**
 * Enables Answering Machine Detection. When a call is answered, Telnyx runs real-time detection to determine if it was picked up by a human or a machine and sends an `call.machine.detection.ended` webhook with the analysis result. If 'greeting_end' or 'detect_words' is used and a 'machine' is detected, you will receive another 'call.machine.greeting.ended' webhook when the answering machine greeting ends with a beep or silence. If `detect_beep` is used, you will only receive 'call.machine.greeting.ended' if a beep is detected.
 */
enum AnsweringMachineDetection: string
{
    case PREMIUM = 'premium';

    case DETECT = 'detect';

    case DETECT_BEEP = 'detect_beep';

    case DETECT_WORDS = 'detect_words';

    case GREETING_END = 'greeting_end';

    case DISABLED = 'disabled';
}
