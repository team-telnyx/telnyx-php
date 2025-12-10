<?php

declare(strict_types=1);

namespace Telnyx\Porting\Events\EventGetResponse\Data\PortingEventNewCommentEvent\Payload\Comment;

/**
 * Identifies the type of the user that created the comment.
 */
enum UserType: string
{
    case USER = 'user';

    case ADMIN = 'admin';

    case SYSTEM = 'system';
}
