<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallAIGatherPartialResultsWebhookEvent\Data1\Payload\MessageHistory;

/**
 * The role of the message sender.
 */
enum Role: string
{
    case ASSISTANT = 'assistant';

    case USER = 'user';
}
