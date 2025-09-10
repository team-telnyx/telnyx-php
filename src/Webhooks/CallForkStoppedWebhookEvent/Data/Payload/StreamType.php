<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallForkStoppedWebhookEvent\Data\Payload;

/**
 * Type of media streamed. It can be either 'raw' or 'decrypted'.
 */
enum StreamType: string
{
    case DECRYPTED = 'decrypted';
}
