<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Calls\Streams\StreamStreamingSidJsonResponse;

/**
 * The status of the streaming.
 */
enum Status: string
{
    case STOPPED = 'stopped';
}
