<?php

declare(strict_types=1);

namespace Telnyx\Comments\CommentMarkAsReadResponse\Data;

enum CommenterType: string
{
    case ADMIN = 'admin';

    case USER = 'user';
}
