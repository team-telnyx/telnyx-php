<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Portouts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Portouts\Comments\CommentListResponse;
use Telnyx\Portouts\Comments\CommentNewResponse;
use Telnyx\RequestOptions;

interface CommentsContract
{
    /**
     * @api
     *
     * @param string $id Portout id
     * @param string $body Comment to post on this portout request
     *
     * @throws APIException
     */
    public function create(
        string $id,
        ?string $body = null,
        ?RequestOptions $requestOptions = null
    ): CommentNewResponse;

    /**
     * @api
     *
     * @param string $id Portout id
     *
     * @throws APIException
     */
    public function list(
        string $id,
        ?RequestOptions $requestOptions = null
    ): CommentListResponse;
}
