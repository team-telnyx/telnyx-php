<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\RequestOptions;
use Telnyx\UserAddresses\UserAddress;
use Telnyx\UserAddresses\UserAddressCreateParams;
use Telnyx\UserAddresses\UserAddressGetResponse;
use Telnyx\UserAddresses\UserAddressListParams;
use Telnyx\UserAddresses\UserAddressNewResponse;

interface UserAddressesRawContract
{
    /**
     * @api
     *
     * @param array<mixed>|UserAddressCreateParams $params
     *
     * @return BaseResponse<UserAddressNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|UserAddressCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id user address ID
     *
     * @return BaseResponse<UserAddressGetResponse>
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
     * @param array<mixed>|UserAddressListParams $params
     *
     * @return BaseResponse<DefaultPagination<UserAddress>>
     *
     * @throws APIException
     */
    public function list(
        array|UserAddressListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
