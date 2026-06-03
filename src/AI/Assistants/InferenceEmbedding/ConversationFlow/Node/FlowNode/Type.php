<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\InferenceEmbedding\ConversationFlow\Node\FlowNode;

/**
 * Node kind discriminator. `prompt` is an LLM-driven step.
 */
enum Type: string
{
    case PROMPT = 'prompt';
}
