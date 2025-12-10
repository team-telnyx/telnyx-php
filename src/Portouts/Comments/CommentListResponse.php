<?php

declare(strict_types=1);

namespace Telnyx\Portouts\Comments;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Metadata;
use Telnyx\Portouts\Comments\CommentListResponse\Data;

/**
 * @phpstan-type CommentListResponseShape = array{
 *   data?: list<Data>|null, meta?: Metadata|null
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
    public ?Metadata $meta;

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
     *   id: string,
     *   body: string,
     *   createdAt: string,
     *   userID: string,
     *   portoutID?: string|null,
     *   recordType?: string|null,
     * }> $data
     * @param Metadata|array{
     *   pageNumber?: float|null,
     *   pageSize?: float|null,
     *   totalPages?: float|null,
     *   totalResults?: float|null,
     * } $meta
     */
    public static function with(
        ?array $data = null,
        Metadata|array|null $meta = null
    ): self {
        $self = new self;

        null !== $data && $self['data'] = $data;
        null !== $meta && $self['meta'] = $meta;

        return $self;
    }

    /**
     * @param list<Data|array{
     *   id: string,
     *   body: string,
     *   createdAt: string,
     *   userID: string,
     *   portoutID?: string|null,
     *   recordType?: string|null,
     * }> $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }

    /**
     * @param Metadata|array{
     *   pageNumber?: float|null,
     *   pageSize?: float|null,
     *   totalPages?: float|null,
     *   totalResults?: float|null,
     * } $meta
     */
    public function withMeta(Metadata|array $meta): self
    {
        $self = clone $this;
        $self['meta'] = $meta;

        return $self;
    }
}
