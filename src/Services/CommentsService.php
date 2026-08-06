<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Comments\CommentCreateParams\CommentRecordType;
use Telnyx\Comments\CommentGetResponse;
use Telnyx\Comments\CommentListParams\Filter;
use Telnyx\Comments\CommentListResponse;
use Telnyx\Comments\CommentMarkAsReadResponse;
use Telnyx\Comments\CommentNewResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\CommentsContract;

/**
 * Number orders.
 *
 * @phpstan-import-type FilterShape from \Telnyx\Comments\CommentListParams\Filter
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
     * Creates a comment associated with a supported number-order record. The response contains the created comment.
     *
     * @param CommentRecordType|value-of<CommentRecordType> $commentRecordType
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        ?string $body = null,
        ?string $commentRecordID = null,
        CommentRecordType|string|null $commentRecordType = null,
        RequestOptions|array|null $requestOptions = null,
    ): CommentNewResponse {
        $params = Util::removeNulls(
            [
                'body' => $body,
                'commentRecordID' => $commentRecordID,
                'commentRecordType' => $commentRecordType,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns the comment identified by `id`, including its associated record and comment metadata.
     *
     * @param string $id the comment ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): CommentGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns comments associated with number-order records. Results can be filtered by record type and record ID and include pagination metadata.
     *
     * @param Filter|FilterShape $filter Consolidated filter parameter (deepObject style). Originally: filter[comment_record_type], filter[comment_record_id]
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        Filter|array|null $filter = null,
        RequestOptions|array|null $requestOptions = null,
    ): CommentListResponse {
        $params = Util::removeNulls(['filter' => $filter]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Marks the specified comment as read. The response contains the updated read state for the comment.
     *
     * @param string $id the comment ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function markAsRead(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): CommentMarkAsReadResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->markAsRead($id, requestOptions: $requestOptions);

        return $response->parse();
    }
}
