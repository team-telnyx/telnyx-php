<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallAIGatherMessageHistoryUpdatedWebhookEvent\Data\Payload\MessageHistory;

/**
 * The role of the message sender.
 */
enum Role: string
{
    case ASSISTANT = 'assistant';

    case USER = 'user';
}
