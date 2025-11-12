<?php

declare(strict_types=1);

namespace Telnyx\AI\Conversations\Messages\MessageListResponse\Data\ToolCall;

/**
 * Type of the tool call.
 */
enum Type: string
{
    case FUNCTION = 'function';
}
