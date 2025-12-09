<?php

declare(strict_types=1);

namespace Telnyx\Comments;

use Telnyx\AuthenticationProviders\PaginationMeta;
use Telnyx\Comments\CommentListResponse\Data;
use Telnyx\Comments\CommentListResponse\Data\CommenterType;
use Telnyx\Comments\CommentListResponse\Data\CommentRecordType;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type CommentListResponseShape = array{
 *   data?: list<Data>|null, meta?: PaginationMeta|null
 * }
 */
final class CommentListResponse implements BaseModel
{
    /** @use SdkModel<CommentListResponseShape> */
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
     *   body?: string|null,
     *   commentRecordID?: string|null,
     *   commentRecordType?: value-of<CommentRecordType>|null,
     *   commenter?: string|null,
     *   commenterType?: value-of<CommenterType>|null,
     *   createdAt?: \DateTimeInterface|null,
     *   readAt?: \DateTimeInterface|null,
     *   updatedAt?: \DateTimeInterface|null,
     * }> $data
     * @param PaginationMeta|array{
     *   pageNumber: int, totalPages: int, pageSize?: int|null, totalResults?: int|null
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
     * @param list<Data|array{
     *   id?: string|null,
     *   body?: string|null,
     *   commentRecordID?: string|null,
     *   commentRecordType?: value-of<CommentRecordType>|null,
     *   commenter?: string|null,
     *   commenterType?: value-of<CommenterType>|null,
     *   createdAt?: \DateTimeInterface|null,
     *   readAt?: \DateTimeInterface|null,
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
     *   pageNumber: int, totalPages: int, pageSize?: int|null, totalResults?: int|null
     * } $meta
     */
    public function withMeta(PaginationMeta|array $meta): self
    {
        $self = clone $this;
        $self['meta'] = $meta;

        return $self;
    }
}
