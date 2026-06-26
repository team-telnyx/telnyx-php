<?php

declare(strict_types=1);

namespace Telnyx\Dir\Comments\CommentNewResponse\Data;

/**
 * Always `customer` on this endpoint - internal-only comments are filtered out.
 */
enum Visibility: string
{
    case CUSTOMER = 'customer';
}
