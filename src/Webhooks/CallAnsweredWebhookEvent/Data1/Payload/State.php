<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallAnsweredWebhookEvent\Data1\Payload;

/**
 * State received from a command.
 */
enum State: string
{
    case ANSWERED = 'answered';
}
