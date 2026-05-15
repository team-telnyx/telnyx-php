<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\ActionStartConversationRelayParams\ConversationRelaySettings;

/**
 * Controls when caller input can interrupt assistant speech. `any` allows speech or DTMF interruptions; `none` disables interruptions; `speech` allows speech only; `dtmf` allows DTMF only.
 */
enum Interruptible: string
{
    case NONE = 'none';

    case ANY = 'any';

    case SPEECH = 'speech';

    case DTMF = 'dtmf';
}
