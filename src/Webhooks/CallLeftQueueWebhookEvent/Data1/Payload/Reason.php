<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallLeftQueueWebhookEvent\Data1\Payload;

/**
 * The reason for leaving the queue.
 */
enum Reason: string
{
    case BRIDGED = 'bridged';

    case BRIDGING_IN_PROCESS = 'bridging-in-process';

    case HANGUP = 'hangup';

    case LEAVE = 'leave';

    case TIMEOUT = 'timeout';
}
