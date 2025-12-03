<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallSiprecFailedWebhookEvent\Data1;

/**
 * The type of event being delivered.
 */
enum EventType: string
{
    case SIPREC_FAILED = 'siprec.failed';
}
