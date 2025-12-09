<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Addresses\AddressCreateParams;
use Telnyx\Addresses\AddressDeleteResponse;
use Telnyx\Addresses\AddressGetResponse;
use Telnyx\Addresses\AddressListParams;
use Telnyx\Addresses\AddressListResponse;
use Telnyx\Addresses\AddressNewResponse;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

interface AddressesRawContract
{
    /**
     * @api
     *
     * @param array<mixed>|AddressCreateParams $params
     *
     * @return BaseResponse<AddressNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|AddressCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id address ID
     *
     * @return BaseResponse<AddressGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|AddressListParams $params
     *
     * @return BaseResponse<AddressListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|AddressListParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id address ID
     *
     * @return BaseResponse<AddressDeleteResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}
