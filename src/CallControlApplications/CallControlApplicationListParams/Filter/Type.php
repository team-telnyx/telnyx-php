<?php

declare(strict_types=1);

namespace Telnyx\CallControlApplications\CallControlApplicationListParams\Filter;

/**
 * Event type.
 */
enum Type: string
{
    case COMMAND = 'command';

    case WEBHOOK = 'webhook';
}
