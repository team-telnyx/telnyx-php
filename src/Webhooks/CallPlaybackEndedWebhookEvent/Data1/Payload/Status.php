<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallPlaybackEndedWebhookEvent\Data1\Payload;

/**
 * Reflects how command ended.
 */
enum Status: string
{
    case FILE_NOT_FOUND = 'file_not_found';

    case CALL_HANGUP = 'call_hangup';

    case UNKNOWN = 'unknown';

    case CANCELLED = 'cancelled';

    case CANCELLED_AMD = 'cancelled_amd';

    case COMPLETED = 'completed';

    case FAILED = 'failed';
}
