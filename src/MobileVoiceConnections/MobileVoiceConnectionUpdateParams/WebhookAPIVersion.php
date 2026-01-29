<?php

declare(strict_types=1);

namespace Telnyx\MobileVoiceConnections\MobileVoiceConnectionUpdateParams;

enum WebhookAPIVersion: string
{
    case V1 = '1';

    case V2 = '2';
}
