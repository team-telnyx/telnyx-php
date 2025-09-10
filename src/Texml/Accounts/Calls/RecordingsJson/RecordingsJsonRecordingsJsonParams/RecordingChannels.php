<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Calls\RecordingsJson\RecordingsJsonRecordingsJsonParams;

/**
 * When `dual`, final audio file has the first leg on channel A, and the rest on channel B. `single` mixes both tracks into a single channel.
 */
enum RecordingChannels: string
{
    case SINGLE = 'single';

    case DUAL = 'dual';
}
