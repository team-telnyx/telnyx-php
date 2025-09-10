<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\Comments\CommentNewResponse\Data;

/**
 * Indicates whether this comment was created by a Telnyx Admin, user, or system.
 */
enum UserType: string
{
    case ADMIN = 'admin';

    case USER = 'user';

    case SYSTEM = 'system';
}
