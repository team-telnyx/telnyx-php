<?php

declare(strict_types=1);

namespace Telnyx\AI\OpenAI\Chat\ChatCreateCompletionParams;

enum ToolChoice: string
{
    case NONE = 'none';

    case AUTO = 'auto';

    case REQUIRED = 'required';
}
