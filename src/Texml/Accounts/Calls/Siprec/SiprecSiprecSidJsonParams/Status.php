<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Calls\Siprec\SiprecSiprecSidJsonParams;

/**
 * The new status of the resource. Specifying `stopped` will end the siprec session.
 */
enum Status: string
{
    case STOPPED = 'stopped';
}
