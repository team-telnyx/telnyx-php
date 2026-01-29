<?php

declare(strict_types=1);

namespace Telnyx\Comments;

use Telnyx\Comments\CommentListParams\Filter;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Retrieve all comments.
 *
 * @see Telnyx\Services\CommentsService::list()
 *
 * @phpstan-import-type FilterShape from \Telnyx\Comments\CommentListParams\Filter
 *
 * @phpstan-type CommentListParamsShape = array{filter?: null|Filter|FilterShape}
 */
final class CommentListParams implements BaseModel
{
    /** @use SdkModel<CommentListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[comment_record_type], filter[comment_record_id].
     */
    #[Optional]
    public ?Filter $filter;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Filter|FilterShape|null $filter
     */
    public static function with(Filter|array|null $filter = null): self
    {
        $self = new self;

        null !== $filter && $self['filter'] = $filter;

        return $self;
    }

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[comment_record_type], filter[comment_record_id].
     *
     * @param Filter|FilterShape $filter
     */
    public function withFilter(Filter|array $filter): self
    {
        $self = clone $this;
        $self['filter'] = $filter;

        return $self;
    }
}
