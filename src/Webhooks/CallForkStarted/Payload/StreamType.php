<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallForkStarted\Payload;

/**
 * Type of media streamed. It can be either 'raw' or 'decrypted'.
 */
enum StreamType: string
{
    case DECRYPTED = 'decrypted';
}
