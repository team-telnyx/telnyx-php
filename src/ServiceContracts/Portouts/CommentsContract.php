<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Portouts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\Portouts\Comments\CommentListResponse;
use Telnyx\Portouts\Comments\CommentNewResponse;
use Telnyx\RequestOptions;

use const Telnyx\Core\OMIT as omit;

interface CommentsContract
{
    /**
     * @api
     *
     * @param string $body Comment to post on this portout request
     *
     * @return CommentNewResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function create(
        string $id,
        $body = omit,
        ?RequestOptions $requestOptions = null
    ): CommentNewResponse;

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
        string $id,
        array $params,
        ?RequestOptions $requestOptions = null
    ): CommentNewResponse;

    /**
     * @api
     *
     * @return CommentListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function list(
        string $id,
        ?RequestOptions $requestOptions = null
    ): CommentListResponse;

    /**
     * @api
     *
     * @return CommentListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function listRaw(
        string $id,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): CommentListResponse;
}
