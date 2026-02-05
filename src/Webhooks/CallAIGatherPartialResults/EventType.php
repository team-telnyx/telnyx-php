<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallAIGatherPartialResults;

/**
 * The type of event being delivered.
 */
enum EventType: string
{
    case CALL_AI_GATHER_PARTIAL_RESULTS = 'call.ai_gather.partial_results';
}
