<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\AccessIPAddress\AccessIPAddressCreateParams;
use Telnyx\AccessIPAddress\AccessIPAddressListParams;
use Telnyx\AccessIPAddress\AccessIPAddressListResponse;
use Telnyx\AccessIPAddress\AccessIPAddressResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

interface AccessIPAddressContract
{
    /**
     * @api
     *
     * @param array<mixed>|AccessIPAddressCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|AccessIPAddressCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): AccessIPAddressResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieve(
        string $accessIPAddressID,
        ?RequestOptions $requestOptions = null
    ): AccessIPAddressResponse;

    /**
     * @api
     *
     * @param array<mixed>|AccessIPAddressListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|AccessIPAddressListParams $params,
        ?RequestOptions $requestOptions = null,
    ): AccessIPAddressListResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function delete(
        string $accessIPAddressID,
        ?RequestOptions $requestOptions = null
    ): AccessIPAddressResponse;
}
