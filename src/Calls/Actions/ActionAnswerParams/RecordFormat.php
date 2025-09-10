<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\ActionAnswerParams;

/**
 * Defines the format of the recording ('wav' or 'mp3') when `record` is specified.
 */
enum RecordFormat: string
{
    case WAV = 'wav';

    case MP3 = 'mp3';
}
