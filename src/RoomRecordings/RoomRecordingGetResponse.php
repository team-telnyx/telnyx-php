<?php

declare(strict_types=1);

namespace Telnyx\RoomRecordings;

use Telnyx\Core\Attributes\Api;
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

    #[Api(optional: true)]
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
     *   completed_at?: \DateTimeInterface|null,
     *   created_at?: \DateTimeInterface|null,
     *   download_url?: string|null,
     *   duration_secs?: int|null,
     *   ended_at?: \DateTimeInterface|null,
     *   participant_id?: string|null,
     *   record_type?: string|null,
     *   room_id?: string|null,
     *   session_id?: string|null,
     *   size_mb?: float|null,
     *   started_at?: \DateTimeInterface|null,
     *   status?: value-of<Status>|null,
     *   type?: value-of<Type>|null,
     *   updated_at?: \DateTimeInterface|null,
     * } $data
     */
    public static function with(Data|array|null $data = null): self
    {
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param Data|array{
     *   id?: string|null,
     *   codec?: string|null,
     *   completed_at?: \DateTimeInterface|null,
     *   created_at?: \DateTimeInterface|null,
     *   download_url?: string|null,
     *   duration_secs?: int|null,
     *   ended_at?: \DateTimeInterface|null,
     *   participant_id?: string|null,
     *   record_type?: string|null,
     *   room_id?: string|null,
     *   session_id?: string|null,
     *   size_mb?: float|null,
     *   started_at?: \DateTimeInterface|null,
     *   status?: value-of<Status>|null,
     *   type?: value-of<Type>|null,
     *   updated_at?: \DateTimeInterface|null,
     * } $data
     */
    public function withData(Data|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
