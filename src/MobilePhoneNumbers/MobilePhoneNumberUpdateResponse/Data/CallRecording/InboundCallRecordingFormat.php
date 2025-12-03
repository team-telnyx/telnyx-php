<?php

declare(strict_types=1);

namespace Telnyx\MobilePhoneNumbers\MobilePhoneNumberUpdateResponse\Data\CallRecording;

enum InboundCallRecordingFormat: string
{
    case WAV = 'wav';

    case MP3 = 'mp3';
}
