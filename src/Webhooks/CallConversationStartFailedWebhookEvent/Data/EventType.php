<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallConversationStartFailedWebhookEvent\Data;

/**
 * The type of event being delivered.
 */
enum EventType: string
{
    case CALL_CONVERSATION_START_FAILED = 'call.conversation.start_failed';
}
