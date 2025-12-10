<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallStreamingFailed;

/**
 * Identifies the resource.
 */
enum RecordType: string
{
    case EVENT = 'event';
}
