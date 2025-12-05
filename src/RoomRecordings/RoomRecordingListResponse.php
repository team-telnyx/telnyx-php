<?php

declare(strict_types=1);

namespace Telnyx\RoomRecordings;

use Telnyx\AuthenticationProviders\PaginationMeta;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;
use Telnyx\RoomRecordings\RoomRecordingListResponse\Data;
use Telnyx\RoomRecordings\RoomRecordingListResponse\Data\Status;
use Telnyx\RoomRecordings\RoomRecordingListResponse\Data\Type;

/**
 * @phpstan-type RoomRecordingListResponseShape = array{
 *   data?: list<Data>|null, meta?: PaginationMeta|null
 * }
 */
final class RoomRecordingListResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<RoomRecordingListResponseShape> */
    use SdkModel;

    use SdkResponse;

    /** @var list<Data>|null $data */
    #[Api(list: Data::class, optional: true)]
    public ?array $data;

    #[Api(optional: true)]
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
     * }> $data
     * @param PaginationMeta|array{
     *   page_number?: int|null,
     *   page_size?: int|null,
     *   total_pages?: int|null,
     *   total_results?: int|null,
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
     *   page_number?: int|null,
     *   page_size?: int|null,
     *   total_pages?: int|null,
     *   total_results?: int|null,
     * } $meta
     */
    public function withMeta(PaginationMeta|array $meta): self
    {
        $obj = clone $this;
        $obj['meta'] = $meta;

        return $obj;
    }
}
