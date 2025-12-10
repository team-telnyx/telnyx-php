<?php

declare(strict_types=1);

namespace Telnyx\MobileVoiceConnections\MobileVoiceConnection;

/**
 * The API version for webhooks.
 */
enum WebhookAPIVersion: string
{
    case V1 = '1';

    case V2 = '2';
}
