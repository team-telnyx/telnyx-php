<?php

declare(strict_types=1);

namespace Telnyx\Comments\CommentNewResponse\Data;

enum CommenterType: string
{
    case ADMIN = 'admin';

    case USER = 'user';
}
