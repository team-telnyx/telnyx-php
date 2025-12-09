<?php

declare(strict_types=1);

namespace Telnyx\RoomRecordings;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\RoomRecordings\RoomRecordingGetResponse\Data;
use Telnyx\RoomRecordings\RoomRecordingGetResponse\Data\Status;
use Telnyx\RoomRecordings\RoomRecordingGetResponse\Data\Type;

/**
 * @phpstan-type RoomRecordingGetResponseShape = array{data?: Data|null}
 */
final class RoomRecordingGetResponse implements BaseModel
{
    /** @use SdkModel<RoomRecordingGetResponseShape> */
    use SdkModel;

    #[Optional]
    public ?Data $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Data|array{
     *   id?: string|null,
     *   codec?: string|null,
     *   completedAt?: \DateTimeInterface|null,
     *   createdAt?: \DateTimeInterface|null,
     *   downloadURL?: string|null,
     *   durationSecs?: int|null,
     *   endedAt?: \DateTimeInterface|null,
     *   participantID?: string|null,
     *   recordType?: string|null,
     *   roomID?: string|null,
     *   sessionID?: string|null,
     *   sizeMB?: float|null,
     *   startedAt?: \DateTimeInterface|null,
     *   status?: value-of<Status>|null,
     *   type?: value-of<Type>|null,
     *   updatedAt?: \DateTimeInterface|null,
     * } $data
     */
    public static function with(Data|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param Data|array{
     *   id?: string|null,
     *   codec?: string|null,
     *   completedAt?: \DateTimeInterface|null,
     *   createdAt?: \DateTimeInterface|null,
     *   downloadURL?: string|null,
     *   durationSecs?: int|null,
     *   endedAt?: \DateTimeInterface|null,
     *   participantID?: string|null,
     *   recordType?: string|null,
     *   roomID?: string|null,
     *   sessionID?: string|null,
     *   sizeMB?: float|null,
     *   startedAt?: \DateTimeInterface|null,
     *   status?: value-of<Status>|null,
     *   type?: value-of<Type>|null,
     *   updatedAt?: \DateTimeInterface|null,
     * } $data
     */
    public function withData(Data|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
