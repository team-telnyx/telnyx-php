<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallAnsweredWebhookEvent\Data\Payload;

/**
 * State received from a command.
 */
enum State: string
{
    case ANSWERED = 'answered';
}
