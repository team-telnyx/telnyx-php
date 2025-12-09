<?php

declare(strict_types=1);

namespace Telnyx\Rooms\Sessions;

use Telnyx\AuthenticationProviders\PaginationMeta;
use Telnyx\Core\Attributes\Optional;
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
    #[Optional(list: RoomSession::class)]
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
     * @param list<RoomSession|array{
     *   id?: string|null,
     *   active?: bool|null,
     *   createdAt?: \DateTimeInterface|null,
     *   endedAt?: \DateTimeInterface|null,
     *   participants?: list<RoomParticipant>|null,
     *   recordType?: string|null,
     *   roomID?: string|null,
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
        $self = new self;

        null !== $data && $self['data'] = $data;
        null !== $meta && $self['meta'] = $meta;

        return $self;
    }

    /**
     * @param list<RoomSession|array{
     *   id?: string|null,
     *   active?: bool|null,
     *   createdAt?: \DateTimeInterface|null,
     *   endedAt?: \DateTimeInterface|null,
     *   participants?: list<RoomParticipant>|null,
     *   recordType?: string|null,
     *   roomID?: string|null,
     *   updatedAt?: \DateTimeInterface|null,
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
