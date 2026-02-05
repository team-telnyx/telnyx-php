<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallConversationEnded;

/**
 * The type of event being delivered.
 */
enum EventType: string
{
    case CALL_CONVERSATION_ENDED = 'call.conversation.ended';
}
