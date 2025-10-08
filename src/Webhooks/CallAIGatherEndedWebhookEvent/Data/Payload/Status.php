<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallAIGatherEndedWebhookEvent\Data\Payload;

/**
 * Reflects how command ended.
 */
enum Status: string
{
    case VALID = 'valid';

    case INVALID = 'invalid';
}
