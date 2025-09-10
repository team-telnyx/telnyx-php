<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\ActionBridgeParams;

/**
 * Defines which channel should be recorded ('single' or 'dual') when `record` is specified.
 */
enum RecordChannels: string
{
    case SINGLE = 'single';

    case DUAL = 'dual';
}
