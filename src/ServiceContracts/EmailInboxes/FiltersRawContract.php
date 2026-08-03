<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\EmailInboxes;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\EmailInboxes\Filters\FilterAddParams;
use Telnyx\EmailInboxes\Filters\FilterAddResponse;
use Telnyx\EmailInboxes\Filters\FilterDeleteAllParams;
use Telnyx\EmailInboxes\Filters\FilterDeleteAllResponse;
use Telnyx\EmailInboxes\Filters\FilterListResponse;
use Telnyx\EmailInboxes\Filters\FilterReplaceParams;
use Telnyx\EmailInboxes\Filters\FilterReplaceResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface FiltersRawContract
{
    /**
     * @api
     *
     * @param string $inboxID email inbox UUID
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<FilterListResponse>
     *
     * @throws APIException
     */
    public function list(
        string $inboxID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $inboxID email inbox UUID
     * @param array<string,mixed>|FilterAddParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<FilterAddResponse>
     *
     * @throws APIException
     */
    public function add(
        string $inboxID,
        array|FilterAddParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $inboxID email inbox UUID
     * @param array<string,mixed>|FilterDeleteAllParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<FilterDeleteAllResponse>
     *
     * @throws APIException
     */
    public function deleteAll(
        string $inboxID,
        array|FilterDeleteAllParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $inboxID email inbox UUID
     * @param array<string,mixed>|FilterReplaceParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<FilterReplaceResponse>
     *
     * @throws APIException
     */
    public function replace(
        string $inboxID,
        array|FilterReplaceParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
