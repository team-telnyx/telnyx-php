<?php

declare(strict_types=1);

namespace Telnyx\Calls\CallDialParams;

/**
 * Enables Answering Machine Detection. Telnyx offers Premium and Standard detections. With Premium detection, when a call is answered, Telnyx runs real-time detection and sends a `call.machine.premium.detection.ended` webhook with one of the following results: `human_residence`, `human_business`, `machine`, `silence` or `fax_detected`. If we detect a beep, we also send a `call.machine.premium.greeting.ended` webhook with the result of `beep_detected`. If we detect a beep before `call.machine.premium.detection.ended` we only send `call.machine.premium.greeting.ended`, and if we detect a beep after `call.machine.premium.detection.ended`, we send both webhooks. With Standard detection, when a call is answered, Telnyx runs real-time detection to determine if it was picked up by a human or a machine and sends an `call.machine.detection.ended` webhook with the analysis result. If `greeting_end` or `detect_words` is used and a `machine` is detected, you will receive another `call.machine.greeting.ended` webhook when the answering machine greeting ends with a beep or silence. If `detect_beep` is used, you will only receive `call.machine.greeting.ended` if a beep is detected. If `answering_machine_detection` is set to `premium_ios_call_screening_detection`, Premium AMD runs with iOS Call Screening support: after an initial `machine` result, Telnyx listens for the iOS call-screening prompt to end or for an Apple Call Screening tone, sends `call.machine.premium.greeting.ended` with `result=prompt_ended` or `call.machine.premium.call_screening.detected` with `result=screening` respectively. When the Apple Call Screening tone is detected, Premium AMD is restarted on the screened call and a `call.machine.premium.detection.ended` webhook with the post-screening classification follows.
 */
enum AnsweringMachineDetection: string
{
    case PREMIUM = 'premium';

    case PREMIUM_IOS_CALL_SCREENING_DETECTION = 'premium_ios_call_screening_detection';

    case DETECT = 'detect';

    case DETECT_BEEP = 'detect_beep';

    case DETECT_WORDS = 'detect_words';

    case GREETING_END = 'greeting_end';

    case DISABLED = 'disabled';
}
