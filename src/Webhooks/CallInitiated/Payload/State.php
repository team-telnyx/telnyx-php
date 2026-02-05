<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallInitiated\Payload;

/**
 * State received from a command.
 */
enum State: string
{
    case PARKED = 'parked';

    case BRIDGING = 'bridging';
}
