<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallReferFailedWebhookEvent\Data;

/**
 * The type of event being delivered.
 */
enum EventType: string
{
    case CALL_REFER_FAILED = 'call.refer.failed';
}
