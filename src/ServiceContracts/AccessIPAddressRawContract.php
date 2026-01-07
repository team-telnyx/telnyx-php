<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\AccessIPAddress\AccessIPAddressCreateParams;
use Telnyx\AccessIPAddress\AccessIPAddressListParams;
use Telnyx\AccessIPAddress\AccessIPAddressResponse;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface AccessIPAddressRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|AccessIPAddressCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AccessIPAddressResponse>
     *
     * @throws APIException
     */
    public function create(
        array|AccessIPAddressCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AccessIPAddressResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $accessIPAddressID,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|AccessIPAddressListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<AccessIPAddressResponse>>
     *
     * @throws APIException
     */
    public function list(
        array|AccessIPAddressListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AccessIPAddressResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $accessIPAddressID,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
