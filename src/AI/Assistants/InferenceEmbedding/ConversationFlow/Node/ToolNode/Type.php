<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\InferenceEmbedding\ConversationFlow\Node\ToolNode;

/**
 * Node kind discriminator. Always `tool` for a tool node.
 */
enum Type: string
{
    case TOOL = 'tool';
}
