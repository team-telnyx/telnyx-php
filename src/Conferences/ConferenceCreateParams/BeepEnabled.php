<?php

declare(strict_types=1);

namespace Telnyx\Conferences\ConferenceCreateParams;

/**
 * Whether a beep sound should be played when participants join and/or leave the conference.
 */
enum BeepEnabled: string
{
    case ALWAYS = 'always';

    case NEVER = 'never';

    case ON_ENTER = 'on_enter';

    case ON_EXIT = 'on_exit';
}
