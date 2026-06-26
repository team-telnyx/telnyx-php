<?php

declare(strict_types=1);

namespace Telnyx\Services\PortingOrders;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\PortingOrders\Comments\CommentListResponse;
use Telnyx\PortingOrders\Comments\CommentNewResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\PortingOrders\CommentsContract;

/**
 * Endpoints related to porting orders management.
 *
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
    ): DefaultFlatPagination {
        $params = Util::removeNulls(
            ['pageNumber' => $pageNumber, 'pageSize' => $pageSize]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
