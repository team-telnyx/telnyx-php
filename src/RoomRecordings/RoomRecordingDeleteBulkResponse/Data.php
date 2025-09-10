<?php

declare(strict_types=1);

namespace Telnyx\RoomRecordings\RoomRecordingDeleteBulkResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type data_alias = array{roomRecordings?: int|null}
 */
final class Data implements BaseModel
{
    /** @use SdkModel<data_alias> */
    use SdkModel;

    /**
     * Amount of room recordings affected.
     */
    #[Api('room_recordings', optional: true)]
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

        null !== $roomRecordings && $obj->roomRecordings = $roomRecordings;

        return $obj;
    }

    /**
     * Amount of room recordings affected.
     */
    public function withRoomRecordings(int $roomRecordings): self
    {
        $obj = clone $this;
        $obj->roomRecordings = $roomRecordings;

        return $obj;
    }
}
