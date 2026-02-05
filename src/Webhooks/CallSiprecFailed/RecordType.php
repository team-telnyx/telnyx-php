<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallSiprecFailed;

/**
 * Identifies the resource.
 */
enum RecordType: string
{
    case EVENT = 'event';
}
