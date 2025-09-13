<?php

declare(strict_types=1);

namespace Telnyx\Services\Portouts;

use Telnyx\Client;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\Portouts\Comments\CommentCreateParams;
use Telnyx\Portouts\Comments\CommentListResponse;
use Telnyx\Portouts\Comments\CommentNewResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Portouts\CommentsContract;

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
     * Creates a comment on a portout request.
     *
     * @param string $body Comment to post on this portout request
     *
     * @return CommentNewResponse<HasRawResponse>
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
            path: ['portouts/%1$s/comments', $id],
            body: (object) $parsed,
            options: $options,
            convert: CommentNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Returns a list of comments for a portout request.
     *
     * @return CommentListResponse<HasRawResponse>
     */
    public function list(
        string $id,
        ?RequestOptions $requestOptions = null
    ): CommentListResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['portouts/%1$s/comments', $id],
            options: $requestOptions,
            convert: CommentListResponse::class,
        );
    }
}
