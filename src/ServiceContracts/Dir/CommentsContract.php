<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Dir;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\Dir\Comments\CommentNewResponse;
use Telnyx\Dir\Comments\CommentType;
use Telnyx\Dir\Comments\DirComment;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface CommentsContract
{
    /**
     * @api
     *
     * @param string $dirID The DIR id. Lowercase UUID.
     * @param string $content Comment body. 1–5000 characters.
     * @param string $parentCommentID optional parent comment id to thread this reply under
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $dirID,
        string $content,
        ?string $parentCommentID = null,
        RequestOptions|array|null $requestOptions = null,
    ): CommentNewResponse;

    /**
     * @api
     *
     * @param string $dirID The DIR id. Lowercase UUID.
     * @param CommentType|value-of<CommentType> $commentType Restrict to comments of this category. Customer-visible categories only: internal-only comments are filtered out regardless of this filter.
     * @param int $pageNumber 1-based page number. Out-of-range values return an empty page with correct meta.
     * @param int $pageSize Items per page. Maximum 250; values above are clamped to 250.
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<DirComment>
     *
     * @throws APIException
     */
    public function list(
        string $dirID,
        CommentType|string|null $commentType = null,
        int $pageNumber = 1,
        int $pageSize = 20,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination;
}
