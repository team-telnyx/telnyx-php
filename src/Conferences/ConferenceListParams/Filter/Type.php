<?php

declare(strict_types=1);

namespace Telnyx\Conferences\ConferenceListParams\Filter;

/**
 * Event type.
 */
enum Type: string
{
    case COMMAND = 'command';

    case WEBHOOK = 'webhook';
}
