<?php

declare(strict_types=1);

namespace Telnyx\EmailInboxes\Filters\MutateInboxFiltersRequest;

/**
 * The list to change.
 */
enum Type: string
{
    case ALLOWLIST = 'allowlist';

    case BLOCKLIST = 'blocklist';
}
