<?php

declare(strict_types=1);

namespace Telnyx\RoomCompositions\RoomCompositionListParams\Filter;

/**
 * The status for filtering room compositions.
 */
enum Status: string
{
    case COMPLETED = 'completed';

    case PROCESSING = 'processing';

    case ENQUEUED = 'enqueued';
}
