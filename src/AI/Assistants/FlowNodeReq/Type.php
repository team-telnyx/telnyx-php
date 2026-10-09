<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\FlowNodeReq;

/**
 * Node kind discriminator. `prompt` (default) is an LLM-driven step; `tool` is a standalone tool execution and `speak` a scripted message (see `ToolNodeReq` / `SpeakNodeReq`).
 */
enum Type: string
{
    case PROMPT = 'prompt';
}
