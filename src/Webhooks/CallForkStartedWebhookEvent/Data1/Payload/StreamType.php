<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallForkStartedWebhookEvent\Data1\Payload;

/**
 * Type of media streamed. It can be either 'raw' or 'decrypted'.
 */
enum StreamType: string
{
    case DECRYPTED = 'decrypted';
}
