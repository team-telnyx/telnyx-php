<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallAnalyzedWebhookEvent\Data;

/**
 * The type of event being delivered.
 */
enum EventType: string
{
    case CALL_ANALYZED = 'call.analyzed';
}
