<?php

declare(strict_types=1);

namespace Telnyx\Comments;

use Telnyx\Comments\CommentListParams\Filter;
use Telnyx\Comments\CommentListParams\Filter\CommentRecordType;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Retrieve all comments.
 *
 * @see Telnyx\Services\CommentsService::list()
 *
 * @phpstan-type CommentListParamsShape = array{
 *   filter?: Filter|array{
 *     comment_record_id?: string|null,
 *     comment_record_type?: value-of<CommentRecordType>|null,
 *   },
 * }
 */
final class CommentListParams implements BaseModel
{
    /** @use SdkModel<CommentListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[comment_record_type], filter[comment_record_id].
     */
    #[Api(optional: true)]
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
     * @param Filter|array{
     *   comment_record_id?: string|null,
     *   comment_record_type?: value-of<CommentRecordType>|null,
     * } $filter
     */
    public static function with(Filter|array|null $filter = null): self
    {
        $obj = new self;

        null !== $filter && $obj['filter'] = $filter;

        return $obj;
    }

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[comment_record_type], filter[comment_record_id].
     *
     * @param Filter|array{
     *   comment_record_id?: string|null,
     *   comment_record_type?: value-of<CommentRecordType>|null,
     * } $filter
     */
    public function withFilter(Filter|array $filter): self
    {
        $obj = clone $this;
        $obj['filter'] = $filter;

        return $obj;
    }
}
