<?php

declare(strict_types=1);

namespace Telnyx\Conferences\Actions\ActionLeaveParams;

/**
 * Whether a beep sound should be played when the participant leaves the conference. Can be used to override the conference-level setting.
 */
enum BeepEnabled: string
{
    case ALWAYS = 'always';

    case NEVER = 'never';

    case ON_ENTER = 'on_enter';

    case ON_EXIT = 'on_exit';
}
