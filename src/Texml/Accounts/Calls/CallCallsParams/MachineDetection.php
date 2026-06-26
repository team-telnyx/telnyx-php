<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Calls\CallCallsParams;

/**
 * Enables Answering Machine Detection.
 */
enum MachineDetection: string
{
    case ENABLE = 'Enable';

    case DISABLE = 'Disable';

    case DETECT_MESSAGE_END = 'DetectMessageEnd';
}
