<?php

declare(strict_types=1);

namespace Telnyx\MobilePhoneNumbers\MobilePhoneNumber\CallRecording;

enum InboundCallRecordingChannels: string
{
    case SINGLE = 'single';

    case DUAL = 'dual';
}
