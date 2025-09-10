<?php

declare(strict_types=1);

namespace Telnyx\Conferences\Actions\ActionUpdateParams;

/**
 * Sets the participant as a supervisor for the conference. A conference can have multiple supervisors. "barge" means the supervisor enters the conference as a normal participant. This is the same as "none". "monitor" means the supervisor is muted but can hear all participants. "whisper" means that only the specified "whisper_call_control_ids" can hear the supervisor. Defaults to "none".
 */
enum SupervisorRole: string
{
    case BARGE = 'barge';

    case MONITOR = 'monitor';

    case NONE = 'none';

    case WHISPER = 'whisper';
}
