<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\PortingOrders;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\PortingOrders\Comments\CommentCreateParams;
use Telnyx\PortingOrders\Comments\CommentListParams;
use Telnyx\PortingOrders\Comments\CommentListResponse;
use Telnyx\PortingOrders\Comments\CommentNewResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface CommentsRawContract
{
    /**
     * @api
     *
     * @param string $id Porting Order id
     * @param array<string,mixed>|CommentCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CommentNewResponse>
     *
     * @throws APIException
     */
    public function create(
        string $id,
        array|CommentCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id Porting Order id
     * @param array<string,mixed>|CommentListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<CommentListResponse>>
     *
     * @throws APIException
     */
    public function list(
        string $id,
        array|CommentListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
