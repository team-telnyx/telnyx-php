<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallSiprecStoppedWebhookEvent\Data;

/**
 * The type of event being delivered.
 */
enum EventType: string
{
    case SIPREC_STOPPED = 'siprec.stopped';
}
