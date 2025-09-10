<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Conferences\Participants\ParticipantParticipantsParams;

/**
 * Whether to play a notification beep to the conference when the participant enters and exits.
 */
enum Beep: string
{
    case TRUE = 'true';

    case FALSE = 'false';

    case ON_ENTER = 'onEnter';

    case ON_EXIT = 'onExit';
}
