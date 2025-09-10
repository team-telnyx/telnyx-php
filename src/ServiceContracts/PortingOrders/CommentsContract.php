<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\PortingOrders;

use Telnyx\PortingOrders\Comments\CommentListParams\Page;
use Telnyx\PortingOrders\Comments\CommentListResponse;
use Telnyx\PortingOrders\Comments\CommentNewResponse;
use Telnyx\RequestOptions;

use const Telnyx\Core\OMIT as omit;

interface CommentsContract
{
    /**
     * @api
     *
     * @param string $body
     */
    public function create(
        string $id,
        $body = omit,
        ?RequestOptions $requestOptions = null
    ): CommentNewResponse;

    /**
     * @api
     *
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     */
    public function list(
        string $id,
        $page = omit,
        ?RequestOptions $requestOptions = null
    ): CommentListResponse;
}
