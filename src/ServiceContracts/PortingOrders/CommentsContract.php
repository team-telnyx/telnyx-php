<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\PortingOrders;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\PortingOrders\Comments\CommentListResponse;
use Telnyx\PortingOrders\Comments\CommentNewResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface CommentsContract
{
    /**
     * @api
     *
     * @param string $id Porting Order id
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $id,
        ?string $body = null,
        RequestOptions|array|null $requestOptions = null,
    ): CommentNewResponse;

    /**
     * @api
     *
     * @param string $id Porting Order id
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<CommentListResponse>
     *
     * @throws APIException
     */
    public function list(
        string $id,
        ?int $pageNumber = null,
        ?int $pageSize = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination;
}
