<?php

declare(strict_types=1);

namespace Telnyx\VoiceClones\VoiceCloneData;

/**
 * Clone status. pending for Ultra clones while on-prem import is in progress, active once ready, failed if verification timed out, expired if not kept alive.
 */
enum Status: string
{
    case ACTIVE = 'active';

    case PENDING = 'pending';

    case FAILED = 'failed';

    case EXPIRED = 'expired';
}
