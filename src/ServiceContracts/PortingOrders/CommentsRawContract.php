<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\PortingOrders;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\PortingOrders\Comments\CommentCreateParams;
use Telnyx\PortingOrders\Comments\CommentListParams;
use Telnyx\PortingOrders\Comments\CommentListResponse;
use Telnyx\PortingOrders\Comments\CommentNewResponse;
use Telnyx\RequestOptions;

interface CommentsRawContract
{
    /**
     * @api
     *
     * @param string $id Porting Order id
     * @param array<mixed>|CommentCreateParams $params
     *
     * @return BaseResponse<CommentNewResponse>
     *
     * @throws APIException
     */
    public function create(
        string $id,
        array|CommentCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id Porting Order id
     * @param array<mixed>|CommentListParams $params
     *
     * @return BaseResponse<DefaultPagination<CommentListResponse>>
     *
     * @throws APIException
     */
    public function list(
        string $id,
        array|CommentListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
