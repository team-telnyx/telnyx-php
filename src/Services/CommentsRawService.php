<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Comments\CommentCreateParams;
use Telnyx\Comments\CommentCreateParams\CommentRecordType;
use Telnyx\Comments\CommentGetResponse;
use Telnyx\Comments\CommentListParams;
use Telnyx\Comments\CommentListParams\Filter;
use Telnyx\Comments\CommentListResponse;
use Telnyx\Comments\CommentMarkAsReadResponse;
use Telnyx\Comments\CommentNewResponse;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\CommentsRawContract;

/**
 * Number orders.
 *
 * @phpstan-import-type FilterShape from \Telnyx\Comments\CommentListParams\Filter
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class CommentsRawService implements CommentsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Creates a comment associated with a supported number-order record. The response contains the created comment.
     *
     * @param array{
     *   body?: string,
     *   commentRecordID?: string,
     *   commentRecordType?: CommentRecordType|value-of<CommentRecordType>,
     * }|CommentCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CommentNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|CommentCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = CommentCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'comments',
            body: (object) $parsed,
            options: $options,
            convert: CommentNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Returns the comment identified by `id`, including its associated record and comment metadata.
     *
     * @param string $id the comment ID
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CommentGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['comments/%1$s', $id],
            options: $requestOptions,
            convert: CommentGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Returns comments associated with number-order records. Results can be filtered by record type and record ID and include pagination metadata.
     *
     * @param array{filter?: Filter|FilterShape}|CommentListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CommentListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|CommentListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = CommentListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'comments',
            query: $parsed,
            options: $options,
            convert: CommentListResponse::class,
        );
    }

    /**
     * @api
     *
     * Marks the specified comment as read. The response contains the updated read state for the comment.
     *
     * @param string $id the comment ID
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CommentMarkAsReadResponse>
     *
     * @throws APIException
     */
    public function markAsRead(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: ['comments/%1$s/read', $id],
            options: $requestOptions,
            convert: CommentMarkAsReadResponse::class,
        );
    }
}
