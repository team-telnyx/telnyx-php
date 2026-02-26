<?php

declare(strict_types=1);

namespace Telnyx\Portouts\Comments;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Metadata;

/**
 * @phpstan-import-type PortoutCommentShape from \Telnyx\Portouts\Comments\PortoutComment
 * @phpstan-import-type MetadataShape from \Telnyx\Metadata
 *
 * @phpstan-type CommentListResponseShape = array{
 *   data?: list<PortoutComment|PortoutCommentShape>|null,
 *   meta?: null|Metadata|MetadataShape,
 * }
 */
final class CommentListResponse implements BaseModel
{
    /** @use SdkModel<CommentListResponseShape> */
    use SdkModel;

    /** @var list<PortoutComment>|null $data */
    #[Optional(list: PortoutComment::class)]
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
     * @param list<PortoutComment|PortoutCommentShape>|null $data
     * @param Metadata|MetadataShape|null $meta
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
     * @param list<PortoutComment|PortoutCommentShape> $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }

    /**
     * @param Metadata|MetadataShape $meta
     */
    public function withMeta(Metadata|array $meta): self
    {
        $self = clone $this;
        $self['meta'] = $meta;

        return $self;
    }
}
