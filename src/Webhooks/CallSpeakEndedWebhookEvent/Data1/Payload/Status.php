<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallSpeakEndedWebhookEvent\Data1\Payload;

/**
 * Reflects how the command ended.
 */
enum Status: string
{
    case COMPLETED = 'completed';

    case CALL_HANGUP = 'call_hangup';

    case CANCELLED_AMD = 'cancelled_amd';
}
