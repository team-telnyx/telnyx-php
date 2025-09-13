<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Portouts;

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
     */
    public function create(
        string $id,
        $body = omit,
        ?RequestOptions $requestOptions = null
    ): CommentNewResponse;

    /**
     * @api
     *
     * @return CommentListResponse<HasRawResponse>
     */
    public function list(
        string $id,
        ?RequestOptions $requestOptions = null
    ): CommentListResponse;
}
