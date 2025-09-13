<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\PortingOrders;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
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
     *
     * @return CommentNewResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function create(
        string $id,
        $body = omit,
        ?RequestOptions $requestOptions = null
    ): CommentNewResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return CommentNewResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function createRaw(
        string $id,
        array $params,
        ?RequestOptions $requestOptions = null
    ): CommentNewResponse;

    /**
     * @api
     *
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     *
     * @return CommentListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function list(
        string $id,
        $page = omit,
        ?RequestOptions $requestOptions = null
    ): CommentListResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return CommentListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function listRaw(
        string $id,
        array $params,
        ?RequestOptions $requestOptions = null
    ): CommentListResponse;
}
