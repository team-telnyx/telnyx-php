<?php

declare(strict_types=1);

namespace Telnyx\Services\Portouts;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Portouts\Comments\CommentCreateParams;
use Telnyx\Portouts\Comments\CommentListResponse;
use Telnyx\Portouts\Comments\CommentNewResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Portouts\CommentsContract;

final class CommentsService implements CommentsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Creates a comment on a portout request.
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

        /** @var BaseResponse<CommentNewResponse> */
        $response = $this->client->request(
            method: 'post',
            path: ['portouts/%1$s/comments', $id],
            body: (object) $parsed,
            options: $options,
            convert: CommentNewResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns a list of comments for a portout request.
     *
     * @throws APIException
     */
    public function list(
        string $id,
        ?RequestOptions $requestOptions = null
    ): CommentListResponse {
        /** @var BaseResponse<CommentListResponse> */
        $response = $this->client->request(
            method: 'get',
            path: ['portouts/%1$s/comments', $id],
            options: $requestOptions,
            convert: CommentListResponse::class,
        );

        return $response->parse();
    }
}
