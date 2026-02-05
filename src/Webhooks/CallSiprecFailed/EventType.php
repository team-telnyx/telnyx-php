<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallSiprecFailed;

/**
 * The type of event being delivered.
 */
enum EventType: string
{
    case SIPREC_FAILED = 'siprec.failed';
}
