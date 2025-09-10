<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallInitiatedWebhookEvent\Data\Payload;

/**
 * Whether the call is `incoming` or `outgoing`.
 */
enum Direction: string
{
    case INCOMING = 'incoming';

    case OUTGOING = 'outgoing';
}
