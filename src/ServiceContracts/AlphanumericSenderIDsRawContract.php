<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\AlphanumericSenderIDs\AlphanumericSenderIDCreateParams;
use Telnyx\AlphanumericSenderIDs\AlphanumericSenderIDDeleteResponse;
use Telnyx\AlphanumericSenderIDs\AlphanumericSenderIDGetResponse;
use Telnyx\AlphanumericSenderIDs\AlphanumericSenderIDListParams;
use Telnyx\AlphanumericSenderIDs\AlphanumericSenderIDListResponse;
use Telnyx\AlphanumericSenderIDs\AlphanumericSenderIDNewResponse;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface AlphanumericSenderIDsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|AlphanumericSenderIDCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AlphanumericSenderIDNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|AlphanumericSenderIDCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id the identifier of the alphanumeric sender ID
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AlphanumericSenderIDGetResponse>
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
     * @param array<string,mixed>|AlphanumericSenderIDListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<AlphanumericSenderIDListResponse>>
     *
     * @throws APIException
     */
    public function list(
        array|AlphanumericSenderIDListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id the identifier of the alphanumeric sender ID
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AlphanumericSenderIDDeleteResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;
}
