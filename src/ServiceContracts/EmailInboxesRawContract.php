<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\EmailCursorPagination;
use Telnyx\EmailInboxes\EmailInbox;
use Telnyx\EmailInboxes\EmailInboxCreateParams;
use Telnyx\EmailInboxes\EmailInboxListParams;
use Telnyx\EmailInboxes\EmailInboxResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface EmailInboxesRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|EmailInboxCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<EmailInboxResponse>
     *
     * @throws APIException
     */
    public function create(
        array|EmailInboxCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id email inbox UUID
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<EmailInboxResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|EmailInboxListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<EmailCursorPagination<EmailInbox>>
     *
     * @throws APIException
     */
    public function list(
        array|EmailInboxListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id email inbox UUID
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;
}
