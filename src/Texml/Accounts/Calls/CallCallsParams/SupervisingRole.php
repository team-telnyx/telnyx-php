<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Calls\CallCallsParams;

/**
 * The supervising role for the new leg. Determines the audio behavior: barge (hear both sides), whisper (only hear supervisor), monitor (hear both sides but supervisor muted). Default: barge.
 */
enum SupervisingRole: string
{
    case BARGE = 'barge';

    case WHISPER = 'whisper';

    case MONITOR = 'monitor';
}
