<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallSiprecStartedWebhookEvent\Data1;

/**
 * The type of event being delivered.
 */
enum EventType: string
{
    case SIPREC_STARTED = 'siprec.started';
}
