<?php

declare(strict_types=1);

namespace Telnyx\RoomCompositions\RoomComposition;

/**
 * Shows the room composition status.
 */
enum Status: string
{
    case COMPLETED = 'completed';

    case ENQUEUED = 'enqueued';

    case PROCESSING = 'processing';
}
