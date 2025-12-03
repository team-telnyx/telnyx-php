<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallAIGatherEndedWebhookEvent\Data1;

/**
 * The type of event being delivered.
 */
enum EventType: string
{
    case CALL_AI_GATHER_ENDED = 'call.ai_gather.ended';
}
