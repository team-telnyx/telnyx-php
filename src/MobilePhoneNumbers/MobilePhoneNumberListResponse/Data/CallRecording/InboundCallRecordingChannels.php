<?php

declare(strict_types=1);

namespace Telnyx\MobilePhoneNumbers\MobilePhoneNumberListResponse\Data\CallRecording;

enum InboundCallRecordingChannels: string
{
    case SINGLE = 'single';

    case DUAL = 'dual';
}
