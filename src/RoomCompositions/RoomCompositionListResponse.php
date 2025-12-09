<?php

declare(strict_types=1);

namespace Telnyx\RoomCompositions;

use Telnyx\AuthenticationProviders\PaginationMeta;
use Telnyx\Core\Attributes\Optional;
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
    #[Optional(list: RoomComposition::class)]
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
     * @param list<RoomComposition|array{
     *   id?: string|null,
     *   completedAt?: \DateTimeInterface|null,
     *   createdAt?: \DateTimeInterface|null,
     *   downloadURL?: string|null,
     *   durationSecs?: int|null,
     *   endedAt?: \DateTimeInterface|null,
     *   format?: value-of<Format>|null,
     *   recordType?: string|null,
     *   roomID?: string|null,
     *   sessionID?: string|null,
     *   sizeMB?: float|null,
     *   startedAt?: \DateTimeInterface|null,
     *   status?: value-of<Status>|null,
     *   updatedAt?: \DateTimeInterface|null,
     *   userID?: string|null,
     *   videoLayout?: array<string,VideoRegion>|null,
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
        $obj = new self;

        null !== $data && $obj['data'] = $data;
        null !== $meta && $obj['meta'] = $meta;

        return $obj;
    }

    /**
     * @param list<RoomComposition|array{
     *   id?: string|null,
     *   completedAt?: \DateTimeInterface|null,
     *   createdAt?: \DateTimeInterface|null,
     *   downloadURL?: string|null,
     *   durationSecs?: int|null,
     *   endedAt?: \DateTimeInterface|null,
     *   format?: value-of<Format>|null,
     *   recordType?: string|null,
     *   roomID?: string|null,
     *   sessionID?: string|null,
     *   sizeMB?: float|null,
     *   startedAt?: \DateTimeInterface|null,
     *   status?: value-of<Status>|null,
     *   updatedAt?: \DateTimeInterface|null,
     *   userID?: string|null,
     *   videoLayout?: array<string,VideoRegion>|null,
     *   webhookEventFailoverURL?: string|null,
     *   webhookEventURL?: string|null,
     *   webhookTimeoutSecs?: int|null,
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
