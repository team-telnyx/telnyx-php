<?php

declare(strict_types=1);

namespace Telnyx\Messsages\MesssageRcsParams;

/**
 * Message type - must be set to "RCS".
 */
enum Type: string
{
    case RCS = 'RCS';
}
