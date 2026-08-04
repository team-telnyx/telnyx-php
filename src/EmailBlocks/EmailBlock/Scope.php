<?php

declare(strict_types=1);

namespace Telnyx\EmailBlocks\EmailBlock;

/**
 * Derived server-side from `domain_id`/`from`; never trusted from the caller.
 */
enum Scope: string
{
    case ACCOUNT = 'account';

    case DOMAIN = 'domain';

    case ADDRESS = 'address';
}
