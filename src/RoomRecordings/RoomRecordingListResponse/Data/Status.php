<?php

declare(strict_types=1);

namespace Telnyx\RoomRecordings\RoomRecordingListResponse\Data;

/**
 * Shows the room recording status.
 */
enum Status: string
{
    case COMPLETED = 'completed';

    case PROCESSING = 'processing';
}
