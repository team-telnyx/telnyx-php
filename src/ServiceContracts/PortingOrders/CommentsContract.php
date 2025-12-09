<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\PortingOrders;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\PortingOrders\Comments\CommentListResponse;
use Telnyx\PortingOrders\Comments\CommentNewResponse;
use Telnyx\RequestOptions;

interface CommentsContract
{
    /**
     * @api
     *
     * @param string $id Porting Order id
     *
     * @throws APIException
     */
    public function create(
        string $id,
        ?string $body = null,
        ?RequestOptions $requestOptions = null
    ): CommentNewResponse;

    /**
     * @api
     *
     * @param string $id Porting Order id
     * @param array{
     *   number?: int, size?: int
     * } $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     *
     * @return DefaultPagination<CommentListResponse>
     *
     * @throws APIException
     */
    public function list(
        string $id,
        ?array $page = null,
        ?RequestOptions $requestOptions = null
    ): DefaultPagination;
}
