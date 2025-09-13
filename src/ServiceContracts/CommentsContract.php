<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Comments\CommentCreateParams\CommentRecordType;
use Telnyx\Comments\CommentGetResponse;
use Telnyx\Comments\CommentListParams\Filter;
use Telnyx\Comments\CommentListResponse;
use Telnyx\Comments\CommentMarkAsReadResponse;
use Telnyx\Comments\CommentNewResponse;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\RequestOptions;

use const Telnyx\Core\OMIT as omit;

interface CommentsContract
{
    /**
     * @api
     *
     * @param string $body
     * @param string $commentRecordID
     * @param CommentRecordType|value-of<CommentRecordType> $commentRecordType
     *
     * @return CommentNewResponse<HasRawResponse>
     */
    public function create(
        $body = omit,
        $commentRecordID = omit,
        $commentRecordType = omit,
        ?RequestOptions $requestOptions = null,
    ): CommentNewResponse;

    /**
     * @api
     *
     * @return CommentGetResponse<HasRawResponse>
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): CommentGetResponse;

    /**
     * @api
     *
     * @param Filter $filter Consolidated filter parameter (deepObject style). Originally: filter[comment_record_type], filter[comment_record_id]
     *
     * @return CommentListResponse<HasRawResponse>
     */
    public function list(
        $filter = omit,
        ?RequestOptions $requestOptions = null
    ): CommentListResponse;

    /**
     * @api
     *
     * @return CommentMarkAsReadResponse<HasRawResponse>
     */
    public function markAsRead(
        string $id,
        ?RequestOptions $requestOptions = null
    ): CommentMarkAsReadResponse;
}
