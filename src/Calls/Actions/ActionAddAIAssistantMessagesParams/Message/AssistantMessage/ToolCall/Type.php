<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\ActionAddAIAssistantMessagesParams\Message\AssistantMessage\ToolCall;

/**
 * The type of the tool. Currently, only `function` is supported.
 */
enum Type: string
{
    case FUNCTION = 'function';
}
