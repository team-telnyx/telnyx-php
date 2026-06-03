<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Calls\CallCallsParams\Params\ApplicationDefault;

/**
 * The number of channels in the final recording. Defaults to `mono`.
 */
enum RecordingChannels: string
{
    case MONO = 'mono';

    case DUAL = 'dual';
}
