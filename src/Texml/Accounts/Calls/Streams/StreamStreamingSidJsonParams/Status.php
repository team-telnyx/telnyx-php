<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Calls\Streams\StreamStreamingSidJsonParams;

/**
 * The status of the Stream you wish to update.
 */
enum Status: string
{
    case STOPPED = 'stopped';
}
