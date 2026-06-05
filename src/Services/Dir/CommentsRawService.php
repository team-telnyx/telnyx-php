<?php

declare(strict_types=1);

namespace Telnyx\Services\Dir;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\Dir\Comments\CommentCreateParams;
use Telnyx\Dir\Comments\CommentListParams;
use Telnyx\Dir\Comments\CommentListParams\CommentType;
use Telnyx\Dir\Comments\CommentListResponse;
use Telnyx\Dir\Comments\CommentNewResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Dir\CommentsRawContract;

/**
 * Read messages from the Telnyx vetting team and reply with clarifying information.
 *
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
     * Post a customer comment on a DIR (for example, to respond to reviewer notes). Send only `content` (1–5000 chars) and an optional `parent_comment_id`; the server sets the comment type, visibility, and author automatically. The enterprise is resolved server-side from the DIR id.
     *
     * @param string $dirID The DIR id. Lowercase UUID.
     * @param array{
     *   content: string, parentCommentID?: string
     * }|CommentCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CommentNewResponse>
     *
     * @throws APIException
     */
    public function create(
        string $dirID,
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
            path: ['dir/%1$s/comments', $dirID],
            body: (object) $parsed,
            options: $options,
            convert: CommentNewResponse::class,
        );
    }

    /**
     * @api
     *
     * List the comments on a DIR. The enterprise is resolved server-side from the DIR id.
     *
     * @param string $dirID The DIR id. Lowercase UUID.
     * @param array{
     *   commentType?: value-of<CommentType>, pageNumber?: int, pageSize?: int
     * }|CommentListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<CommentListResponse>>
     *
     * @throws APIException
     */
    public function list(
        string $dirID,
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
            path: ['dir/%1$s/comments', $dirID],
            query: Util::array_transform_keys(
                $parsed,
                [
                    'commentType' => 'comment_type',
                    'pageNumber' => 'page[number]',
                    'pageSize' => 'page[size]',
                ],
            ),
            options: $options,
            convert: CommentListResponse::class,
            page: DefaultFlatPagination::class,
        );
    }
}
