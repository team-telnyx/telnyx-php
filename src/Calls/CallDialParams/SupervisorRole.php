<?php

declare(strict_types=1);

namespace Telnyx\Calls\CallDialParams;

/**
 * The role of the supervisor call. 'barge' means that supervisor call hears and is being heard by both ends of the call (caller & callee). 'whisper' means that only supervised_call_control_id hears supervisor but supervisor can hear everything. 'monitor' means that nobody can hear supervisor call, but supervisor can hear everything on the call.
 */
enum SupervisorRole: string
{
    case BARGE = 'barge';

    case WHISPER = 'whisper';

    case MONITOR = 'monitor';
}
