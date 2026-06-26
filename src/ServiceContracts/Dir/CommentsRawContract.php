<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Dir;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\Dir\Comments\CommentCreateParams;
use Telnyx\Dir\Comments\CommentListParams;
use Telnyx\Dir\Comments\CommentListResponse;
use Telnyx\Dir\Comments\CommentNewResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface CommentsRawContract
{
    /**
     * @api
     *
     * @param string $dirID The DIR id. Lowercase UUID.
     * @param array<string,mixed>|CommentCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CommentNewResponse>
     *
     * @throws APIException
     */
    public function create(
        string $dirID,
        array|CommentCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $dirID The DIR id. Lowercase UUID.
     * @param array<string,mixed>|CommentListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<CommentListResponse>>
     *
     * @throws APIException
     */
    public function list(
        string $dirID,
        array|CommentListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
