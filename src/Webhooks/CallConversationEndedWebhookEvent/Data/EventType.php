<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallConversationEndedWebhookEvent\Data;

/**
 * The type of event being delivered.
 */
enum EventType: string
{
    case CALL_CONVERSATION_ENDED = 'call.conversation.ended';
}
