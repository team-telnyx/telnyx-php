<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Networks\NetworkCreateParams;
use Telnyx\Networks\NetworkDeleteResponse;
use Telnyx\Networks\NetworkGetResponse;
use Telnyx\Networks\NetworkListInterfacesParams;
use Telnyx\Networks\NetworkListInterfacesResponse;
use Telnyx\Networks\NetworkListParams;
use Telnyx\Networks\NetworkListResponse;
use Telnyx\Networks\NetworkNewResponse;
use Telnyx\Networks\NetworkUpdateParams;
use Telnyx\Networks\NetworkUpdateResponse;
use Telnyx\RequestOptions;

interface NetworksContract
{
    /**
     * @api
     *
     * @param array<mixed>|NetworkCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|NetworkCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): NetworkNewResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): NetworkGetResponse;

    /**
     * @api
     *
     * @param array<mixed>|NetworkUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|NetworkUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): NetworkUpdateResponse;

    /**
     * @api
     *
     * @param array<mixed>|NetworkListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|NetworkListParams $params,
        ?RequestOptions $requestOptions = null
    ): NetworkListResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): NetworkDeleteResponse;

    /**
     * @api
     *
     * @param array<mixed>|NetworkListInterfacesParams $params
     *
     * @throws APIException
     */
    public function listInterfaces(
        string $id,
        array|NetworkListInterfacesParams $params,
        ?RequestOptions $requestOptions = null,
    ): NetworkListInterfacesResponse;
}
