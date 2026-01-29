<?php

declare(strict_types=1);

namespace Telnyx\Services\PortingOrders;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultPagination;
use Telnyx\PortingOrders\Comments\CommentListParams\Page;
use Telnyx\PortingOrders\Comments\CommentListResponse;
use Telnyx\PortingOrders\Comments\CommentNewResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\PortingOrders\CommentsContract;

/**
 * @phpstan-import-type PageShape from \Telnyx\PortingOrders\Comments\CommentListParams\Page
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class CommentsService implements CommentsContract
{
    /**
     * @api
     */
    public CommentsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new CommentsRawService($client);
    }

    /**
     * @api
     *
     * Creates a new comment for a porting order.
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
    ): CommentNewResponse {
        $params = Util::removeNulls(['body' => $body]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns a list of all comments of a porting order.
     *
     * @param string $id Porting Order id
     * @param Page|PageShape $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultPagination<CommentListResponse>
     *
     * @throws APIException
     */
    public function list(
        string $id,
        Page|array|null $page = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultPagination {
        $params = Util::removeNulls(['page' => $page]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
