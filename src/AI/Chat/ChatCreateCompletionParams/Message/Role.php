<?php

declare(strict_types=1);

namespace Telnyx\AI\Chat\ChatCreateCompletionParams\Message;

enum Role: string
{
    case SYSTEM = 'system';

    case USER = 'user';

    case ASSISTANT = 'assistant';

    case TOOL = 'tool';
}
