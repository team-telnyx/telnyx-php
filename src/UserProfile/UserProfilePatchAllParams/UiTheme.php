<?php

declare(strict_types=1);

namespace Telnyx\UserProfile\UserProfilePatchAllParams;

/**
 * User interface theme: 0 for dark or 1 for light.
 */
enum UiTheme: int
{
    case DARK = 0;

    case LIGHT = 1;
}
