<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallAIGatherMessageHistoryUpdatedWebhookEvent\Data1;

/**
 * The type of event being delivered.
 */
enum EventType: string
{
    case CALL_AI_GATHER_MESSAGE_HISTORY_UPDATED = 'call.ai_gather.message_history_updated';
}
