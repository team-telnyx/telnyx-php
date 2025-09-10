<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Calls\CallSiprecJsonResponse;

/**
 * The status of the siprec session.
 */
enum Status: string
{
    case IN_PROGRESS = 'in-progress';

    case STOPPED = 'stopped';
}
