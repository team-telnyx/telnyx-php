<?php

declare(strict_types=1);

namespace Telnyx\Rooms\Sessions;

use Telnyx\AuthenticationProviders\PaginationMeta;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\RoomParticipant;

/**
 * @phpstan-type SessionGetParticipantsResponseShape = array{
 *   data?: list<RoomParticipant>|null, meta?: PaginationMeta|null
 * }
 */
final class SessionGetParticipantsResponse implements BaseModel
{
    /** @use SdkModel<SessionGetParticipantsResponseShape> */
    use SdkModel;

    /** @var list<RoomParticipant>|null $data */
    #[Optional(list: RoomParticipant::class)]
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
     * @param list<RoomParticipant|array{
     *   id?: string|null,
     *   context?: string|null,
     *   joinedAt?: \DateTimeInterface|null,
     *   leftAt?: \DateTimeInterface|null,
     *   recordType?: string|null,
     *   sessionID?: string|null,
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
     * @param list<RoomParticipant|array{
     *   id?: string|null,
     *   context?: string|null,
     *   joinedAt?: \DateTimeInterface|null,
     *   leftAt?: \DateTimeInterface|null,
     *   recordType?: string|null,
     *   sessionID?: string|null,
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
