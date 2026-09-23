<?php

declare(strict_types=1);

namespace Telnyx\Texml\Calls\CallNewResponse;

/**
 * The initial status of the outbound call.
 */
enum Status: string
{
    case QUEUED = 'queued';
}
