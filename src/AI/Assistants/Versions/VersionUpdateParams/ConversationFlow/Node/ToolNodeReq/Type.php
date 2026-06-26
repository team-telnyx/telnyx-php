<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\Versions\VersionUpdateParams\ConversationFlow\Node\ToolNodeReq;

/**
 * Node kind discriminator. Always `tool` for a tool node.
 */
enum Type: string
{
    case TOOL = 'tool';
}
