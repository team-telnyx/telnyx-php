<?php

declare(strict_types=1);

namespace Telnyx\Services\PortingOrders;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\PortingOrders\Comments\CommentCreateParams;
use Telnyx\PortingOrders\Comments\CommentListParams;
use Telnyx\PortingOrders\Comments\CommentListResponse;
use Telnyx\PortingOrders\Comments\CommentNewResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\PortingOrders\CommentsContract;

final class CommentsService implements CommentsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Creates a new comment for a porting order.
     *
     * @param array{body?: string}|CommentCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        string $id,
        array|CommentCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): CommentNewResponse {
        [$parsed, $options] = CommentCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['porting_orders/%1$s/comments', $id],
            body: (object) $parsed,
            options: $options,
            convert: CommentNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Returns a list of all comments of a porting order.
     *
     * @param array{page?: array{number?: int, size?: int}}|CommentListParams $params
     *
     * @return DefaultPagination<CommentListResponse>
     *
     * @throws APIException
     */
    public function list(
        string $id,
        array|CommentListParams $params,
        ?RequestOptions $requestOptions = null,
    ): DefaultPagination {
        [$parsed, $options] = CommentListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['porting_orders/%1$s/comments', $id],
            query: $parsed,
            options: $options,
            convert: CommentListResponse::class,
            page: DefaultPagination::class,
        );
    }
}
