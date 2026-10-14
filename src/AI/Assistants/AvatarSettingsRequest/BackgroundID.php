<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\AvatarSettingsRequest;

/**
 * The background to render.
 */
enum BackgroundID: string
{
    case OFFICE = 'office';

    case STUDIO = 'studio';

    case RECEPTION = 'reception';
}
