<?php

declare(strict_types=1);

namespace Telnyx\AI\Avatars\Avatar;

/**
 * MIME type of a custom avatar image.
 */
enum ContentType: string
{
    case IMAGE_JPEG = 'image/jpeg';

    case IMAGE_PNG = 'image/png';

    case IMAGE_WEBP = 'image/webp';
}
