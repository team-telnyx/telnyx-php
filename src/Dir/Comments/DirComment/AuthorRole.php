<?php

declare(strict_types=1);

namespace Telnyx\Dir\Comments\DirComment;

/**
 * Who wrote the comment. `admin` covers the Telnyx vetting team.
 */
enum AuthorRole: string
{
    case CUSTOMER = 'customer';

    case ADMIN = 'admin';
}
