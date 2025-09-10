<?php

declare(strict_types=1);

namespace Telnyx\AI\Chat\ChatCreateCompletionParams;

enum ToolChoice: string
{
    case NONE = 'none';

    case AUTO = 'auto';

    case REQUIRED = 'required';
}
