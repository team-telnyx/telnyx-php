<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\InferenceEmbedding\ConversationFlow\Node\FlowNode;

/**
 * How `instructions` combine with the assistant-level instructions. `replace` (default): the node's instructions are used alone. `append`: the node's instructions are concatenated after the assistant's instructions.
 */
enum InstructionsMode: string
{
    case REPLACE = 'replace';

    case APPEND = 'append';
}
