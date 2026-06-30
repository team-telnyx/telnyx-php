<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Calls\CallCallsParams\Params\ApplicationDefault;

/**
 * Allows you to choose between Regular, Premium, and PremiumCallScreening detections. See https://developers.telnyx.com/docs/voice/programmable-voice/answering-machine-detection.
 */
enum DetectionMode: string
{
    case PREMIUM = 'Premium';

    case REGULAR = 'Regular';

    case PREMIUM_CALL_SCREENING = 'PremiumCallScreening';
}
