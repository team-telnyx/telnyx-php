<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\AssistantUpdateParams\ConversationFlow\Node\FlowNodeReq;

/**
 * How `shared_tool_ids` combine with the assistant-level tool set. `replace` (default): only the node's tools are callable. `append`: the node's tools are added to the assistant's tools. Ignored when `shared_tool_ids` is null.
 */
enum ToolsMode: string
{
    case REPLACE = 'replace';

    case APPEND = 'append';
}
