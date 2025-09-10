<?php

declare(strict_types=1);

namespace Telnyx\Calls\CallDialParams;

/**
 * When set to `trim-silence`, silence will be removed from the beginning and end of the recording.
 */
enum RecordTrim: string
{
    case TRIM_SILENCE = 'trim-silence';
}
