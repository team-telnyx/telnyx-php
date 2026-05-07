<?php

declare(strict_types=1);

namespace Telnyx\AI\OpenAI\Chat\ChatCreateCompletionParams\Message\Content\TextAndImageArray;

enum Type: string
{
    case TEXT = 'text';

    case IMAGE_URL = 'image_url';
}
