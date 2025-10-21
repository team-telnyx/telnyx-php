<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallGatherEndedWebhookEvent\Data\Payload;

/**
 * Reflects how command ended.
 */
enum Status: string
{
    case VALID = 'valid';

    case INVALID = 'invalid';

    case CALL_HANGUP = 'call_hangup';

    case CANCELLED = 'cancelled';

    case CANCELLED_AMD = 'cancelled_amd';

    case TIMEOUT = 'timeout';
}
