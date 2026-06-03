<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\Versions\UpdateAssistant\ConversationFlow\Node\FlowNodeReq;

/**
 * Node kind discriminator. `prompt` (default) is an LLM-driven step; `tool` is a standalone tool execution (see `ToolNodeReq`).
 */
enum Type: string
{
    case PROMPT = 'prompt';
}
