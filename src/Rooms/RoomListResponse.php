<?php

declare(strict_types=1);

namespace Telnyx\Rooms;

use Telnyx\AuthenticationProviders\PaginationMeta;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type RoomListResponseShape = array{
 *   data?: list<Room>|null, meta?: PaginationMeta|null
 * }
 */
final class RoomListResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<RoomListResponseShape> */
    use SdkModel;

    use SdkResponse;

    /** @var list<Room>|null $data */
    #[Api(list: Room::class, optional: true)]
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
     * @param list<Room|array{
     *   id?: string|null,
     *   active_session_id?: string|null,
     *   created_at?: \DateTimeInterface|null,
     *   enable_recording?: bool|null,
     *   max_participants?: int|null,
     *   record_type?: string|null,
     *   sessions?: list<RoomSession>|null,
     *   unique_name?: string|null,
     *   updated_at?: \DateTimeInterface|null,
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
     * @param list<Room|array{
     *   id?: string|null,
     *   active_session_id?: string|null,
     *   created_at?: \DateTimeInterface|null,
     *   enable_recording?: bool|null,
     *   max_participants?: int|null,
     *   record_type?: string|null,
     *   sessions?: list<RoomSession>|null,
     *   unique_name?: string|null,
     *   updated_at?: \DateTimeInterface|null,
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
