<?php

declare(strict_types=1);

namespace Telnyx\Messsages\RcsAgentMessage\ContentMessage\RichCard\StandaloneCard;

/**
 * Image preview alignment for standalone cards with horizontal layout.
 */
enum ThumbnailImageAlignment: string
{
    case THUMBNAIL_IMAGE_ALIGNMENT_UNSPECIFIED = 'THUMBNAIL_IMAGE_ALIGNMENT_UNSPECIFIED';

    case LEFT = 'LEFT';

    case RIGHT = 'RIGHT';
}
