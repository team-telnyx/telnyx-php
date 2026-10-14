<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallConversationCreatedWebhookEvent\Data;

/**
 * The type of event being delivered.
 */
enum EventType: string
{
    case CALL_CONVERSATION_CREATED = 'call.conversation.created';
}
