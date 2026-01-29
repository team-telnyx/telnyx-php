<?php

declare(strict_types=1);

namespace Telnyx\MobilePhoneNumbers\MobilePhoneNumberUpdateParams\CallRecording;

enum InboundCallRecordingFormat: string
{
    case WAV = 'wav';

    case MP3 = 'mp3';
}
