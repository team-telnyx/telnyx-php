<?php

declare(strict_types=1);

namespace Telnyx\RoomRecordings\RoomRecordingDeleteBulkResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{room_recordings?: int|null}
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * Amount of room recordings affected.
     */
    #[Optional]
    public ?int $room_recordings;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?int $room_recordings = null): self
    {
        $obj = new self;

        null !== $room_recordings && $obj['room_recordings'] = $room_recordings;

        return $obj;
    }

    /**
     * Amount of room recordings affected.
     */
    public function withRoomRecordings(int $roomRecordings): self
    {
        $obj = clone $this;
        $obj['room_recordings'] = $roomRecordings;

        return $obj;
    }
}
