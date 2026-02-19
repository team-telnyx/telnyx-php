<?php

declare(strict_types=1);

namespace Telnyx\Conferences\ConferenceUpdateParticipantParams;

/**
 * Whether entry/exit beeps are enabled for this participant.
 */
enum BeepEnabled: string
{
    case ALWAYS = 'always';

    case NEVER = 'never';

    case ON_ENTER = 'on_enter';

    case ON_EXIT = 'on_exit';
}
