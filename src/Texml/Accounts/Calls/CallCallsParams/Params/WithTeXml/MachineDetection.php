<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Calls\CallCallsParams\Params\WithTeXml;

/**
 * Enables Answering Machine Detection.
 */
enum MachineDetection: string
{
    case ENABLE = 'Enable';

    case DISABLE = 'Disable';

    case DETECT_MESSAGE_END = 'DetectMessageEnd';
}
