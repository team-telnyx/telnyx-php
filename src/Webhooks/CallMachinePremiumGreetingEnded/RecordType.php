<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallMachinePremiumGreetingEnded;

/**
 * Identifies the type of the resource.
 */
enum RecordType: string
{
    case EVENT = 'event';
}
