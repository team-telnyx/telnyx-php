<?php

declare(strict_types=1);

namespace Telnyx\EmailInboxes\Filters\FilterDeleteAllParams;

/**
 * The list to change.
 */
enum Type: string
{
    case ALLOWLIST = 'allowlist';

    case BLOCKLIST = 'blocklist';
}
