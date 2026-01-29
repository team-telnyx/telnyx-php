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

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface CommentsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|CommentCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CommentNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|CommentCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id the comment ID
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CommentGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|CommentListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CommentListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|CommentListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id the comment ID
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CommentMarkAsReadResponse>
     *
     * @throws APIException
     */
    public function markAsRead(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;
}
