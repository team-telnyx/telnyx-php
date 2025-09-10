<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\ActionGatherUsingAIParams\MessageHistory;

/**
 * The role of the message sender.
 */
enum Role: string
{
    case ASSISTANT = 'assistant';

    case USER = 'user';
}
