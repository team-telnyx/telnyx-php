<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallConversationEnded\Payload\Message\ToolCall;

/**
 * The type of tool call.
 */
enum Type: string
{
    case FUNCTION = 'function';
}
