<?php

declare(strict_types=1);

namespace Telnyx\AI\Conversations\Messages\MessageListResponse;

/**
 * The role of the message sender.
 */
enum Role: string
{
    case USER = 'user';

    case ASSISTANT = 'assistant';

    case TOOL = 'tool';
}
