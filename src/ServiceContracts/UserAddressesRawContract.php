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

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface UserAddressesRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|UserAddressCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<UserAddressNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|UserAddressCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id user address ID
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<UserAddressGetResponse>
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
     * @param array<string,mixed>|UserAddressListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultPagination<UserAddress>>
     *
     * @throws APIException
     */
    public function list(
        array|UserAddressListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
