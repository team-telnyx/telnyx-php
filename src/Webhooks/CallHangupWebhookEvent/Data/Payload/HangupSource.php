<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallHangupWebhookEvent\Data\Payload;

/**
 * The party who ended the call (`callee`, `caller`, `unknown`).
 */
enum HangupSource: string
{
    case CALLER = 'caller';

    case CALLEE = 'callee';

    case UNKNOWN = 'unknown';
}
