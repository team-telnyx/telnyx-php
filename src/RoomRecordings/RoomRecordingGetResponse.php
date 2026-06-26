<?php

declare(strict_types=1);

namespace Telnyx\RoomRecordings;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type RoomRecordingShape from \Telnyx\RoomRecordings\RoomRecording
 *
 * @phpstan-type RoomRecordingGetResponseShape = array{
 *   data?: null|RoomRecording|RoomRecordingShape
 * }
 */
final class RoomRecordingGetResponse implements BaseModel
{
    /** @use SdkModel<RoomRecordingGetResponseShape> */
    use SdkModel;

    #[Optional]
    public ?RoomRecording $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param RoomRecording|RoomRecordingShape|null $data
     */
    public static function with(RoomRecording|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param RoomRecording|RoomRecordingShape $data
     */
    public function withData(RoomRecording|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
