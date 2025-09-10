<?php

declare(strict_types=1);

namespace Telnyx\Conferences\Actions\ActionRecordStartParams;

/**
 * When set to `trim-silence`, silence will be removed from the beginning and end of the recording.
 */
enum Trim: string
{
    case TRIM_SILENCE = 'trim-silence';
}
