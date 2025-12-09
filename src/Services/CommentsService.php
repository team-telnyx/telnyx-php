<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Comments\CommentCreateParams;
use Telnyx\Comments\CommentCreateParams\CommentRecordType;
use Telnyx\Comments\CommentGetResponse;
use Telnyx\Comments\CommentListParams;
use Telnyx\Comments\CommentListResponse;
use Telnyx\Comments\CommentMarkAsReadResponse;
use Telnyx\Comments\CommentNewResponse;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\CommentsContract;

final class CommentsService implements CommentsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create a comment
     *
     * @param array{
     *   body?: string,
     *   comment_record_id?: string,
     *   comment_record_type?: 'sub_number_order'|'requirement_group'|CommentRecordType,
     * }|CommentCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|CommentCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): CommentNewResponse {
        [$parsed, $options] = CommentCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<CommentNewResponse> */
        $response = $this->client->request(
            method: 'post',
            path: 'comments',
            body: (object) $parsed,
            options: $options,
            convert: CommentNewResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve a comment
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): CommentGetResponse {
        /** @var BaseResponse<CommentGetResponse> */
        $response = $this->client->request(
            method: 'get',
            path: ['comments/%1$s', $id],
            options: $requestOptions,
            convert: CommentGetResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve all comments
     *
     * @param array{
     *   filter?: array{
     *     comment_record_id?: string,
     *     comment_record_type?: 'sub_number_order'|'requirement_group'|CommentListParams\Filter\CommentRecordType,
     *   },
     * }|CommentListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|CommentListParams $params,
        ?RequestOptions $requestOptions = null
    ): CommentListResponse {
        [$parsed, $options] = CommentListParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<CommentListResponse> */
        $response = $this->client->request(
            method: 'get',
            path: 'comments',
            query: $parsed,
            options: $options,
            convert: CommentListResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Mark a comment as read
     *
     * @throws APIException
     */
    public function markAsRead(
        string $id,
        ?RequestOptions $requestOptions = null
    ): CommentMarkAsReadResponse {
        /** @var BaseResponse<CommentMarkAsReadResponse> */
        $response = $this->client->request(
            method: 'patch',
            path: ['comments/%1$s/read', $id],
            options: $requestOptions,
            convert: CommentMarkAsReadResponse::class,
        );

        return $response->parse();
    }
}
