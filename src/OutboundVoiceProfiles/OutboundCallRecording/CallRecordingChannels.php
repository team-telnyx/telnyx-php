<?php

declare(strict_types=1);

namespace Telnyx\OutboundVoiceProfiles\OutboundCallRecording;

/**
 * When using 'dual' channels, the final audio file will be a stereo recording with the first leg on channel A, and the rest on channel B.
 */
enum CallRecordingChannels: string
{
    case SINGLE = 'single';

    case DUAL = 'dual';
}
