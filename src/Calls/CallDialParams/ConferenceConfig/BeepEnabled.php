<?php

declare(strict_types=1);

namespace Telnyx\Calls\CallDialParams\ConferenceConfig;

/**
 * Whether a beep sound should be played when the participant joins and/or leaves the conference. Can be used to override the conference-level setting.
 */
enum BeepEnabled: string
{
    case ALWAYS = 'always';

    case NEVER = 'never';

    case ON_ENTER = 'on_enter';

    case ON_EXIT = 'on_exit';
}
