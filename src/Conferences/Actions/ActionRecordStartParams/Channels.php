<?php

declare(strict_types=1);

namespace Telnyx\Conferences\Actions\ActionRecordStartParams;

/**
 * When `dual`, final audio file will be stereo recorded with the conference creator on the first channel, and the rest on the second channel.
 */
enum Channels: string
{
    case SINGLE = 'single';

    case DUAL = 'dual';
}
