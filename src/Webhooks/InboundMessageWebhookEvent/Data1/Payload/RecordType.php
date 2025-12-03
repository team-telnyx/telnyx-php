<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\InboundMessageWebhookEvent\Data1\Payload;

/**
 * Identifies the type of the resource.
 */
enum RecordType: string
{
    case MESSAGE = 'message';
}
