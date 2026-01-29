<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Portouts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Portouts\Comments\CommentListResponse;
use Telnyx\Portouts\Comments\CommentNewResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface CommentsContract
{
    /**
     * @api
     *
     * @param string $id Portout id
     * @param string $body Comment to post on this portout request
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $id,
        ?string $body = null,
        RequestOptions|array|null $requestOptions = null,
    ): CommentNewResponse;

    /**
     * @api
     *
     * @param string $id Portout id
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): CommentListResponse;
}
