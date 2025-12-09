<?php

declare(strict_types=1);

namespace Telnyx\RoomRecordings;

use Telnyx\AuthenticationProviders\PaginationMeta;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\RoomRecordings\RoomRecordingListResponse\Data;
use Telnyx\RoomRecordings\RoomRecordingListResponse\Data\Status;
use Telnyx\RoomRecordings\RoomRecordingListResponse\Data\Type;

/**
 * @phpstan-type RoomRecordingListResponseShape = array{
 *   data?: list<Data>|null, meta?: PaginationMeta|null
 * }
 */
final class RoomRecordingListResponse implements BaseModel
{
    /** @use SdkModel<RoomRecordingListResponseShape> */
    use SdkModel;

    /** @var list<Data>|null $data */
    #[Optional(list: Data::class)]
    public ?array $data;

    #[Optional]
    public ?PaginationMeta $meta;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<Data|array{
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
     * }> $data
     * @param PaginationMeta|array{
     *   pageNumber?: int|null,
     *   pageSize?: int|null,
     *   totalPages?: int|null,
     *   totalResults?: int|null,
     * } $meta
     */
    public static function with(
        ?array $data = null,
        PaginationMeta|array|null $meta = null
    ): self {
        $obj = new self;

        null !== $data && $obj['data'] = $data;
        null !== $meta && $obj['meta'] = $meta;

        return $obj;
    }

    /**
     * @param list<Data|array{
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
     * }> $data
     */
    public function withData(array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param PaginationMeta|array{
     *   pageNumber?: int|null,
     *   pageSize?: int|null,
     *   totalPages?: int|null,
     *   totalResults?: int|null,
     * } $meta
     */
    public function withMeta(PaginationMeta|array $meta): self
    {
        $obj = clone $this;
        $obj['meta'] = $meta;

        return $obj;
    }
}
