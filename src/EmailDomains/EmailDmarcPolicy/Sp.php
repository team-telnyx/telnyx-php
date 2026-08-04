<?php

declare(strict_types=1);

namespace Telnyx\EmailDomains\EmailDmarcPolicy;

/**
 * Policy for subdomains. Omitted from the record when null.
 */
enum Sp: string
{
    case NONE = 'none';

    case QUARANTINE = 'quarantine';

    case REJECT = 'reject';
}
