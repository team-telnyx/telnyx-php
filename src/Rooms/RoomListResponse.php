<?php

declare(strict_types=1);

namespace Telnyx\Rooms;

use Telnyx\AuthenticationProviders\PaginationMeta;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type RoomListResponseShape = array{
 *   data?: list<Room>|null, meta?: PaginationMeta|null
 * }
 */
final class RoomListResponse implements BaseModel
{
    /** @use SdkModel<RoomListResponseShape> */
    use SdkModel;

    /** @var list<Room>|null $data */
    #[Optional(list: Room::class)]
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
     * @param list<Room|array{
     *   id?: string|null,
     *   activeSessionID?: string|null,
     *   createdAt?: \DateTimeInterface|null,
     *   enableRecording?: bool|null,
     *   maxParticipants?: int|null,
     *   recordType?: string|null,
     *   sessions?: list<RoomSession>|null,
     *   uniqueName?: string|null,
     *   updatedAt?: \DateTimeInterface|null,
     *   webhookEventFailoverURL?: string|null,
     *   webhookEventURL?: string|null,
     *   webhookTimeoutSecs?: int|null,
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
        $self = new self;

        null !== $data && $self['data'] = $data;
        null !== $meta && $self['meta'] = $meta;

        return $self;
    }

    /**
     * @param list<Room|array{
     *   id?: string|null,
     *   activeSessionID?: string|null,
     *   createdAt?: \DateTimeInterface|null,
     *   enableRecording?: bool|null,
     *   maxParticipants?: int|null,
     *   recordType?: string|null,
     *   sessions?: list<RoomSession>|null,
     *   uniqueName?: string|null,
     *   updatedAt?: \DateTimeInterface|null,
     *   webhookEventFailoverURL?: string|null,
     *   webhookEventURL?: string|null,
     *   webhookTimeoutSecs?: int|null,
     * }> $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
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
        $self = clone $this;
        $self['meta'] = $meta;

        return $self;
    }
}
