<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\ActionTransferParams;

/**
 * Start recording automatically after an event. Disabled by default.
 */
enum Record: string
{
    case RECORD_FROM_ANSWER = 'record-from-answer';
}
