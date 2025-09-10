<?php

declare(strict_types=1);

namespace Telnyx\Services\PortingOrders;

use Telnyx\Client;
use Telnyx\PortingOrders\Comments\CommentCreateParams;
use Telnyx\PortingOrders\Comments\CommentListParams;
use Telnyx\PortingOrders\Comments\CommentListParams\Page;
use Telnyx\PortingOrders\Comments\CommentListResponse;
use Telnyx\PortingOrders\Comments\CommentNewResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\PortingOrders\CommentsContract;

use const Telnyx\Core\OMIT as omit;

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
     * @param string $body
     */
    public function create(
        string $id,
        $body = omit,
        ?RequestOptions $requestOptions = null
    ): CommentNewResponse {
        [$parsed, $options] = CommentCreateParams::parseRequest(
            ['body' => $body],
            $requestOptions
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
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     */
    public function list(
        string $id,
        $page = omit,
        ?RequestOptions $requestOptions = null
    ): CommentListResponse {
        [$parsed, $options] = CommentListParams::parseRequest(
            ['page' => $page],
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['porting_orders/%1$s/comments', $id],
            query: $parsed,
            options: $options,
            convert: CommentListResponse::class,
        );
    }
}
