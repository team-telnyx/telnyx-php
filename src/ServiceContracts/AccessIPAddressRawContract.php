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

interface AccessIPAddressRawContract
{
    /**
     * @api
     *
     * @param array<mixed>|AccessIPAddressCreateParams $params
     *
     * @return BaseResponse<AccessIPAddressResponse>
     *
     * @throws APIException
     */
    public function create(
        array|AccessIPAddressCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @return BaseResponse<AccessIPAddressResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $accessIPAddressID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|AccessIPAddressListParams $params
     *
     * @return BaseResponse<DefaultFlatPagination<AccessIPAddressResponse>>
     *
     * @throws APIException
     */
    public function list(
        array|AccessIPAddressListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @return BaseResponse<AccessIPAddressResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $accessIPAddressID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}
