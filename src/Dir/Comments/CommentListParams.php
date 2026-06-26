<?php

declare(strict_types=1);

namespace Telnyx\Dir\Comments;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Dir\Comments\CommentListParams\CommentType;

/**
 * List the comments on a DIR. The enterprise is resolved server-side from the DIR id.
 *
 * @see Telnyx\Services\Dir\CommentsService::list()
 *
 * @phpstan-type CommentListParamsShape = array{
 *   commentType?: null|CommentType|value-of<CommentType>,
 *   pageNumber?: int|null,
 *   pageSize?: int|null,
 * }
 */
final class CommentListParams implements BaseModel
{
    /** @use SdkModel<CommentListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Restrict to comments of this category. Customer-visible categories only: internal-only comments are filtered out regardless of this filter.
     *
     * @var value-of<CommentType>|null $commentType
     */
    #[Optional(enum: CommentType::class)]
    public ?string $commentType;

    /**
     * 1-based page number. Out-of-range values return an empty page with correct meta.
     */
    #[Optional]
    public ?int $pageNumber;

    /**
     * Items per page. Maximum 250; values above are clamped to 250.
     */
    #[Optional]
    public ?int $pageSize;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param CommentType|value-of<CommentType>|null $commentType
     */
    public static function with(
        CommentType|string|null $commentType = null,
        ?int $pageNumber = null,
        ?int $pageSize = null,
    ): self {
        $self = new self;

        null !== $commentType && $self['commentType'] = $commentType;
        null !== $pageNumber && $self['pageNumber'] = $pageNumber;
        null !== $pageSize && $self['pageSize'] = $pageSize;

        return $self;
    }

    /**
     * Restrict to comments of this category. Customer-visible categories only: internal-only comments are filtered out regardless of this filter.
     *
     * @param CommentType|value-of<CommentType> $commentType
     */
    public function withCommentType(CommentType|string $commentType): self
    {
        $self = clone $this;
        $self['commentType'] = $commentType;

        return $self;
    }

    /**
     * 1-based page number. Out-of-range values return an empty page with correct meta.
     */
    public function withPageNumber(int $pageNumber): self
    {
        $self = clone $this;
        $self['pageNumber'] = $pageNumber;

        return $self;
    }

    /**
     * Items per page. Maximum 250; values above are clamped to 250.
     */
    public function withPageSize(int $pageSize): self
    {
        $self = clone $this;
        $self['pageSize'] = $pageSize;

        return $self;
    }
}
