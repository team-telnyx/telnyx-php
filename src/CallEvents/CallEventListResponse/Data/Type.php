<?php

declare(strict_types=1);

namespace Telnyx\CallEvents\CallEventListResponse\Data;

/**
 * Event type.
 */
enum Type: string
{
    case COMMAND = 'command';

    case WEBHOOK = 'webhook';
}
