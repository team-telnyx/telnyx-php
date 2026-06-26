<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Calls\CallGetResponse;

/**
 * The direction of this call.
 */
enum Direction: string
{
    case INBOUND = 'inbound';

    case OUTBOUND = 'outbound';
}
