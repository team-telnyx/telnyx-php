<?php

declare(strict_types=1);

namespace Telnyx\OutboundVoiceProfiles\OutboundCallRecording;

/**
 * Specifies which calls are recorded.
 */
enum CallRecordingType: string
{
    case ALL = 'all';

    case NONE = 'none';

    case BY_CALLER_PHONE_NUMBER = 'by_caller_phone_number';
}
