<?php

declare(strict_types=1);

namespace Telnyx\RoomRecordings\RoomRecordingDeleteBulkResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{roomRecordings?: int|null}
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * Amount of room recordings affected.
     */
    #[Optional('room_recordings')]
    public ?int $roomRecordings;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?int $roomRecordings = null): self
    {
        $obj = new self;

        null !== $roomRecordings && $obj['roomRecordings'] = $roomRecordings;

        return $obj;
    }

    /**
     * Amount of room recordings affected.
     */
    public function withRoomRecordings(int $roomRecordings): self
    {
        $obj = clone $this;
        $obj['roomRecordings'] = $roomRecordings;

        return $obj;
    }
}
