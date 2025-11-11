<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\PortingOrders;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\PortingOrders\Comments\CommentCreateParams;
use Telnyx\PortingOrders\Comments\CommentListParams;
use Telnyx\PortingOrders\Comments\CommentListResponse;
use Telnyx\PortingOrders\Comments\CommentNewResponse;
use Telnyx\RequestOptions;

interface CommentsContract
{
    /**
     * @api
     *
     * @param array<mixed>|CommentCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        string $id,
        array|CommentCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): CommentNewResponse;

    /**
     * @api
     *
     * @param array<mixed>|CommentListParams $params
     *
     * @throws APIException
     */
    public function list(
        string $id,
        array|CommentListParams $params,
        ?RequestOptions $requestOptions = null,
    ): CommentListResponse;
}
