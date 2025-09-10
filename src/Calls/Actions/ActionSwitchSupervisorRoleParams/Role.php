<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\ActionSwitchSupervisorRoleParams;

/**
 * The supervisor role to switch to. 'barge' allows speaking to both parties, 'whisper' allows speaking to caller only, 'monitor' allows listening only.
 */
enum Role: string
{
    case BARGE = 'barge';

    case WHISPER = 'whisper';

    case MONITOR = 'monitor';
}
