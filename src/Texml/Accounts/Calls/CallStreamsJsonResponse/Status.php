<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Calls\CallStreamsJsonResponse;

/**
 * The status of the streaming.
 */
enum Status: string
{
    case IN_PROGRESS = 'in-progress';
}
