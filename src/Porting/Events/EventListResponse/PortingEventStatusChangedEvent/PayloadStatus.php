<?php

declare(strict_types=1);

namespace Telnyx\Porting\Events\EventListResponse\PortingEventStatusChangedEvent;

/**
 * The status of the payload generation.
 */
enum PayloadStatus: string
{
    case CREATED = 'created';

    case COMPLETED = 'completed';
}
