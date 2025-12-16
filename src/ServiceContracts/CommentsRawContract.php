<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Comments\CommentCreateParams;
use Telnyx\Comments\CommentGetResponse;
use Telnyx\Comments\CommentListParams;
use Telnyx\Comments\CommentListResponse;
use Telnyx\Comments\CommentMarkAsReadResponse;
use Telnyx\Comments\CommentNewResponse;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

interface CommentsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|CommentCreateParams $params
     *
     * @return BaseResponse<CommentNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|CommentCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id the comment ID
     *
     * @return BaseResponse<CommentGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|CommentListParams $params
     *
     * @return BaseResponse<CommentListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|CommentListParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id the comment ID
     *
     * @return BaseResponse<CommentMarkAsReadResponse>
     *
     * @throws APIException
     */
    public function markAsRead(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}
