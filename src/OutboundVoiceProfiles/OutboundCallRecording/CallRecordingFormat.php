<?php

declare(strict_types=1);

namespace Telnyx\OutboundVoiceProfiles\OutboundCallRecording;

/**
 * The audio file format for calls being recorded.
 */
enum CallRecordingFormat: string
{
    case WAV = 'wav';

    case MP3 = 'mp3';
}
