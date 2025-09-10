<?php

declare(strict_types=1);

namespace Telnyx\AI\Chat\ChatCreateCompletionParams\ResponseFormat;

enum Type: string
{
    case TEXT = 'text';

    case JSON_OBJECT = 'json_object';
}
