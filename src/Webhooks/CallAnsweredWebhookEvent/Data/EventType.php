<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallAnsweredWebhookEvent\Data;

/**
 * The type of event being delivered.
 */
enum EventType: string
{
    case CALL_ANSWERED = 'call.answered';
}
