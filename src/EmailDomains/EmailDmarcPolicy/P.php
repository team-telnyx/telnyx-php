<?php

declare(strict_types=1);

namespace Telnyx\EmailDomains\EmailDmarcPolicy;

/**
 * Policy applied to messages that fail alignment.
 */
enum P: string
{
    case NONE = 'none';

    case QUARANTINE = 'quarantine';

    case REJECT = 'reject';
}
