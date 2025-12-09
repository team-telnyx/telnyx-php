<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Comments\CommentGetResponse;
use Telnyx\Comments\CommentListParams\Filter\CommentRecordType;
use Telnyx\Comments\CommentListResponse;
use Telnyx\Comments\CommentMarkAsReadResponse;
use Telnyx\Comments\CommentNewResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

interface CommentsContract
{
    /**
     * @api
     *
     * @param 'sub_number_order'|'requirement_group'|\Telnyx\Comments\CommentCreateParams\CommentRecordType $commentRecordType
     *
     * @throws APIException
     */
    public function create(
        ?string $body = null,
        ?string $commentRecordID = null,
        string|\Telnyx\Comments\CommentCreateParams\CommentRecordType|null $commentRecordType = null,
        ?RequestOptions $requestOptions = null,
    ): CommentNewResponse;

    /**
     * @api
     *
     * @param string $id the comment ID
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): CommentGetResponse;

    /**
     * @api
     *
     * @param array{
     *   commentRecordID?: string,
     *   commentRecordType?: 'sub_number_order'|'requirement_group'|CommentRecordType,
     * } $filter Consolidated filter parameter (deepObject style). Originally: filter[comment_record_type], filter[comment_record_id]
     *
     * @throws APIException
     */
    public function list(
        ?array $filter = null,
        ?RequestOptions $requestOptions = null
    ): CommentListResponse;

    /**
     * @api
     *
     * @param string $id the comment ID
     *
     * @throws APIException
     */
    public function markAsRead(
        string $id,
        ?RequestOptions $requestOptions = null
    ): CommentMarkAsReadResponse;
}
