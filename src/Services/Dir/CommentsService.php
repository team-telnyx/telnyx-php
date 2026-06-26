<?php

declare(strict_types=1);

namespace Telnyx\Services\Dir;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\Dir\Comments\CommentNewResponse;
use Telnyx\Dir\Comments\CommentType;
use Telnyx\Dir\Comments\DirComment;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Dir\CommentsContract;

/**
 * Read messages from the Telnyx vetting team and reply with clarifying information.
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
     * Post a customer comment on a DIR (for example, to respond to reviewer notes). Send only `content` (1–5000 chars) and an optional `parent_comment_id`; the server sets the comment type, visibility, and author automatically. The enterprise is resolved server-side from the DIR id.
     *
     * @param string $dirID The DIR id. Lowercase UUID.
     * @param string $content Comment body. 1–5000 characters.
     * @param string $parentCommentID optional parent comment id to thread this reply under
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $dirID,
        string $content,
        ?string $parentCommentID = null,
        RequestOptions|array|null $requestOptions = null,
    ): CommentNewResponse {
        $params = Util::removeNulls(
            ['content' => $content, 'parentCommentID' => $parentCommentID]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create($dirID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * List the comments on a DIR. The enterprise is resolved server-side from the DIR id.
     *
     * @param string $dirID The DIR id. Lowercase UUID.
     * @param CommentType|value-of<CommentType> $commentType Restrict to comments of this category. Customer-visible categories only: internal-only comments are filtered out regardless of this filter.
     * @param int $pageNumber 1-based page number. Out-of-range values return an empty page with correct meta.
     * @param int $pageSize Items per page. Maximum 250; values above are clamped to 250.
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<DirComment>
     *
     * @throws APIException
     */
    public function list(
        string $dirID,
        CommentType|string|null $commentType = null,
        int $pageNumber = 1,
        int $pageSize = 20,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination {
        $params = Util::removeNulls(
            [
                'commentType' => $commentType,
                'pageNumber' => $pageNumber,
                'pageSize' => $pageSize,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($dirID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
