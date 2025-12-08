<?php

declare(strict_types=1);

namespace Telnyx\RoomCompositions;

use Telnyx\AuthenticationProviders\PaginationMeta;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\RoomCompositions\RoomComposition\Format;
use Telnyx\RoomCompositions\RoomComposition\Status;

/**
 * @phpstan-type RoomCompositionListResponseShape = array{
 *   data?: list<RoomComposition>|null, meta?: PaginationMeta|null
 * }
 */
final class RoomCompositionListResponse implements BaseModel
{
    /** @use SdkModel<RoomCompositionListResponseShape> */
    use SdkModel;

    /** @var list<RoomComposition>|null $data */
    #[Api(list: RoomComposition::class, optional: true)]
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
     * @param list<RoomComposition|array{
     *   id?: string|null,
     *   completed_at?: \DateTimeInterface|null,
     *   created_at?: \DateTimeInterface|null,
     *   download_url?: string|null,
     *   duration_secs?: int|null,
     *   ended_at?: \DateTimeInterface|null,
     *   format?: value-of<Format>|null,
     *   record_type?: string|null,
     *   room_id?: string|null,
     *   session_id?: string|null,
     *   size_mb?: float|null,
     *   started_at?: \DateTimeInterface|null,
     *   status?: value-of<Status>|null,
     *   updated_at?: \DateTimeInterface|null,
     *   user_id?: string|null,
     *   video_layout?: array<string,VideoRegion>|null,
     *   webhook_event_failover_url?: string|null,
     *   webhook_event_url?: string|null,
     *   webhook_timeout_secs?: int|null,
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
     * @param list<RoomComposition|array{
     *   id?: string|null,
     *   completed_at?: \DateTimeInterface|null,
     *   created_at?: \DateTimeInterface|null,
     *   download_url?: string|null,
     *   duration_secs?: int|null,
     *   ended_at?: \DateTimeInterface|null,
     *   format?: value-of<Format>|null,
     *   record_type?: string|null,
     *   room_id?: string|null,
     *   session_id?: string|null,
     *   size_mb?: float|null,
     *   started_at?: \DateTimeInterface|null,
     *   status?: value-of<Status>|null,
     *   updated_at?: \DateTimeInterface|null,
     *   user_id?: string|null,
     *   video_layout?: array<string,VideoRegion>|null,
     *   webhook_event_failover_url?: string|null,
     *   webhook_event_url?: string|null,
     *   webhook_timeout_secs?: int|null,
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
