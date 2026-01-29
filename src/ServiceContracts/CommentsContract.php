<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Comments\CommentCreateParams\CommentRecordType;
use Telnyx\Comments\CommentGetResponse;
use Telnyx\Comments\CommentListParams\Filter;
use Telnyx\Comments\CommentListResponse;
use Telnyx\Comments\CommentMarkAsReadResponse;
use Telnyx\Comments\CommentNewResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type FilterShape from \Telnyx\Comments\CommentListParams\Filter
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface CommentsContract
{
    /**
     * @api
     *
     * @param CommentRecordType|value-of<CommentRecordType> $commentRecordType
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        ?string $body = null,
        ?string $commentRecordID = null,
        CommentRecordType|string|null $commentRecordType = null,
        RequestOptions|array|null $requestOptions = null,
    ): CommentNewResponse;

    /**
     * @api
     *
     * @param string $id the comment ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): CommentGetResponse;

    /**
     * @api
     *
     * @param Filter|FilterShape $filter Consolidated filter parameter (deepObject style). Originally: filter[comment_record_type], filter[comment_record_id]
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        Filter|array|null $filter = null,
        RequestOptions|array|null $requestOptions = null,
    ): CommentListResponse;

    /**
     * @api
     *
     * @param string $id the comment ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function markAsRead(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): CommentMarkAsReadResponse;
}
