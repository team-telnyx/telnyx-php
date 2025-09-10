<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers\Voice\CallRecording;

/**
 * The audio file format for calls being recorded.
 */
enum InboundCallRecordingFormat: string
{
    case WAV = 'wav';

    case MP3 = 'mp3';
}
