<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\ExternalConnections;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\ExternalConnections\CivicAddresses\CivicAddressGetResponse;
use Telnyx\ExternalConnections\CivicAddresses\CivicAddressListParams;
use Telnyx\ExternalConnections\CivicAddresses\CivicAddressListResponse;
use Telnyx\ExternalConnections\CivicAddresses\CivicAddressRetrieveParams;
use Telnyx\RequestOptions;

interface CivicAddressesContract
{
    /**
     * @api
     *
     * @param array<mixed>|CivicAddressRetrieveParams $params
     *
     * @throws APIException
     */
    public function retrieve(
        string $addressID,
        array|CivicAddressRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): CivicAddressGetResponse;

    /**
     * @api
     *
     * @param array<mixed>|CivicAddressListParams $params
     *
     * @throws APIException
     */
    public function list(
        string $id,
        array|CivicAddressListParams $params,
        ?RequestOptions $requestOptions = null,
    ): CivicAddressListResponse;
}
