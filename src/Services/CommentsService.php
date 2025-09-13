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
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\CommentsContract;

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
     * Create a comment
     *
     * @param string $body
     * @param string $commentRecordID
     * @param CommentRecordType|value-of<CommentRecordType> $commentRecordType
     *
     * @return CommentNewResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function create(
        $body = omit,
        $commentRecordID = omit,
        $commentRecordType = omit,
        ?RequestOptions $requestOptions = null,
    ): CommentNewResponse {
        $params = [
            'body' => $body,
            'commentRecordID' => $commentRecordID,
            'commentRecordType' => $commentRecordType,
        ];

        return $this->createRaw($params, $requestOptions);
    }

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
        array $params,
        ?RequestOptions $requestOptions = null
    ): CommentNewResponse {
        [$parsed, $options] = CommentCreateParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
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
     * Retrieve a comment
     *
     * @return CommentGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): CommentGetResponse {
        $params = [];

        return $this->retrieveRaw($id, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @return CommentGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveRaw(
        string $id,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): CommentGetResponse {
        // @phpstan-ignore-next-line;
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
     * Retrieve all comments
     *
     * @param Filter $filter Consolidated filter parameter (deepObject style). Originally: filter[comment_record_type], filter[comment_record_id]
     *
     * @return CommentListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function list(
        $filter = omit,
        ?RequestOptions $requestOptions = null
    ): CommentListResponse {
        $params = ['filter' => $filter];

        return $this->listRaw($params, $requestOptions);
    }

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
        array $params,
        ?RequestOptions $requestOptions = null
    ): CommentListResponse {
        [$parsed, $options] = CommentListParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
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
     * Mark a comment as read
     *
     * @return CommentMarkAsReadResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function markAsRead(
        string $id,
        ?RequestOptions $requestOptions = null
    ): CommentMarkAsReadResponse {
        $params = [];

        return $this->markAsReadRaw($id, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @return CommentMarkAsReadResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function markAsReadRaw(
        string $id,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): CommentMarkAsReadResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'patch',
            path: ['comments/%1$s/read', $id],
            options: $requestOptions,
            convert: CommentMarkAsReadResponse::class,
        );
    }
}
