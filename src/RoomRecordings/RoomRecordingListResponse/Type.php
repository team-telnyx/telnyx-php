<?php

declare(strict_types=1);

namespace Telnyx\RoomRecordings\RoomRecordingListResponse;

/**
 * Shows the room recording type.
 */
enum Type: string
{
    case AUDIO = 'audio';

    case VIDEO = 'video';
}
