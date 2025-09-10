<?php

declare(strict_types=1);

namespace Telnyx\Conferences\Actions\ActionRecordStartParams;

/**
 * The audio file format used when storing the conference recording. Can be either `mp3` or `wav`.
 */
enum Format: string
{
    case WAV = 'wav';

    case MP3 = 'mp3';
}
