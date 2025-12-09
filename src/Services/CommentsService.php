<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Comments\CommentGetResponse;
use Telnyx\Comments\CommentListParams\Filter\CommentRecordType;
use Telnyx\Comments\CommentListResponse;
use Telnyx\Comments\CommentMarkAsReadResponse;
use Telnyx\Comments\CommentNewResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\CommentsContract;

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
     * Create a comment
     *
     * @param 'sub_number_order'|'requirement_group'|\Telnyx\Comments\CommentCreateParams\CommentRecordType $commentRecordType
     *
     * @throws APIException
     */
    public function create(
        ?string $body = null,
        ?string $commentRecordID = null,
        string|\Telnyx\Comments\CommentCreateParams\CommentRecordType|null $commentRecordType = null,
        ?RequestOptions $requestOptions = null,
    ): CommentNewResponse {
        $params = [
            'body' => $body,
            'commentRecordID' => $commentRecordID,
            'commentRecordType' => $commentRecordType,
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve a comment
     *
     * @param string $id the comment ID
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): CommentGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve all comments
     *
     * @param array{
     *   commentRecordID?: string,
     *   commentRecordType?: 'sub_number_order'|'requirement_group'|CommentRecordType,
     * } $filter Consolidated filter parameter (deepObject style). Originally: filter[comment_record_type], filter[comment_record_id]
     *
     * @throws APIException
     */
    public function list(
        ?array $filter = null,
        ?RequestOptions $requestOptions = null
    ): CommentListResponse {
        $params = ['filter' => $filter];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Mark a comment as read
     *
     * @param string $id the comment ID
     *
     * @throws APIException
     */
    public function markAsRead(
        string $id,
        ?RequestOptions $requestOptions = null
    ): CommentMarkAsReadResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->markAsRead($id, requestOptions: $requestOptions);

        return $response->parse();
    }
}
