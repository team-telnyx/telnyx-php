<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Addresses\AddressCreateParams;
use Telnyx\Addresses\AddressDeleteResponse;
use Telnyx\Addresses\AddressGetResponse;
use Telnyx\Addresses\AddressListParams;
use Telnyx\Addresses\AddressListResponse;
use Telnyx\Addresses\AddressNewResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

interface AddressesContract
{
    /**
     * @api
     *
     * @param array<mixed>|AddressCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|AddressCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): AddressNewResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): AddressGetResponse;

    /**
     * @api
     *
     * @param array<mixed>|AddressListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|AddressListParams $params,
        ?RequestOptions $requestOptions = null
    ): AddressListResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): AddressDeleteResponse;
}
