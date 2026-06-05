<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\InferenceEmbedding\ConversationFlow\Node\SpeakNode;

/**
 * Node kind discriminator. Always `speak` for a speak node.
 */
enum Type: string
{
    case SPEAK = 'speak';
}
