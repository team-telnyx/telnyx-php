<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\UserMessage;

/**
 * The role of the messages author, in this case `user`.
 */
enum Role: string
{
    case USER = 'user';
}
