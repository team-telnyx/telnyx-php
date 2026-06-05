<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\Versions\UpdateAssistant\ConversationFlow\Node\SpeakNodeReq;

/**
 * Node kind discriminator. Always `speak` for a speak node.
 */
enum Type: string
{
    case SPEAK = 'speak';
}
