<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\RequestOptions;
use Telnyx\UserAddresses\UserAddress;
use Telnyx\UserAddresses\UserAddressCreateParams;
use Telnyx\UserAddresses\UserAddressGetResponse;
use Telnyx\UserAddresses\UserAddressListParams;
use Telnyx\UserAddresses\UserAddressNewResponse;

interface UserAddressesContract
{
    /**
     * @api
     *
     * @param array<mixed>|UserAddressCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|UserAddressCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): UserAddressNewResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): UserAddressGetResponse;

    /**
     * @api
     *
     * @param array<mixed>|UserAddressListParams $params
     *
     * @return DefaultPagination<UserAddress>
     *
     * @throws APIException
     */
    public function list(
        array|UserAddressListParams $params,
        ?RequestOptions $requestOptions = null,
    ): DefaultPagination;
}
