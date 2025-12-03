<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallDtmfReceivedWebhookEvent\Data1;

/**
 * The type of event being delivered.
 */
enum EventType: string
{
    case CALL_DTMF_RECEIVED = 'call.dtmf.received';
}
