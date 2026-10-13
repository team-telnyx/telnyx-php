<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\TelnyxAvatarSettings;

/**
 * The background to render.
 */
enum BackgroundID: string
{
    case OFFICE = 'office';

    case STUDIO = 'studio';

    case RECEPTION = 'reception';
}
