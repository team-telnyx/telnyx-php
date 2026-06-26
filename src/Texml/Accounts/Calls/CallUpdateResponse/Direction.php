<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Calls\CallUpdateResponse;

/**
 * The direction of this call.
 */
enum Direction: string
{
    case INBOUND = 'inbound';

    case OUTBOUND = 'outbound';
}
