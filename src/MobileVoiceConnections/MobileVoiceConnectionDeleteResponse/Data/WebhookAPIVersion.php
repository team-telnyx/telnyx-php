<?php

declare(strict_types=1);

namespace Telnyx\MobileVoiceConnections\MobileVoiceConnectionDeleteResponse\Data;

/**
 * The API version for webhooks.
 */
enum WebhookAPIVersion: string
{
    case _1 = '1';

    case _2 = '2';
}
