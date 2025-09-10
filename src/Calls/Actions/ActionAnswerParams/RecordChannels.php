<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\ActionAnswerParams;

/**
 * Defines which channel should be recorded ('single' or 'dual') when `record` is specified.
 */
enum RecordChannels: string
{
    case SINGLE = 'single';

    case DUAL = 'dual';
}
