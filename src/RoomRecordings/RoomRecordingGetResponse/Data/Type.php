<?php

declare(strict_types=1);

namespace Telnyx\RoomRecordings\RoomRecordingGetResponse\Data;

/**
 * Shows the room recording type.
 */
enum Type: string
{
    case AUDIO = 'audio';

    case VIDEO = 'video';
}
