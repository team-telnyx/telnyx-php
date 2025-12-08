<?php

declare(strict_types=1);

namespace Telnyx\Rooms\Sessions;

use Telnyx\AuthenticationProviders\PaginationMeta;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\RoomParticipant;
use Telnyx\Rooms\RoomSession;

/**
 * @phpstan-type SessionList0ResponseShape = array{
 *   data?: list<RoomSession>|null, meta?: PaginationMeta|null
 * }
 */
final class SessionList0Response implements BaseModel
{
    /** @use SdkModel<SessionList0ResponseShape> */
    use SdkModel;

    /** @var list<RoomSession>|null $data */
    #[Api(list: RoomSession::class, optional: true)]
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
     * @param list<RoomSession|array{
     *   id?: string|null,
     *   active?: bool|null,
     *   created_at?: \DateTimeInterface|null,
     *   ended_at?: \DateTimeInterface|null,
     *   participants?: list<RoomParticipant>|null,
     *   record_type?: string|null,
     *   room_id?: string|null,
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
     * @param list<RoomSession|array{
     *   id?: string|null,
     *   active?: bool|null,
     *   created_at?: \DateTimeInterface|null,
     *   ended_at?: \DateTimeInterface|null,
     *   participants?: list<RoomParticipant>|null,
     *   record_type?: string|null,
     *   room_id?: string|null,
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
