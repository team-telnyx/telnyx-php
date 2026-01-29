<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\ExternalConnections;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\ExternalConnections\CivicAddresses\CivicAddressGetResponse;
use Telnyx\ExternalConnections\CivicAddresses\CivicAddressListParams;
use Telnyx\ExternalConnections\CivicAddresses\CivicAddressListResponse;
use Telnyx\ExternalConnections\CivicAddresses\CivicAddressRetrieveParams;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface CivicAddressesRawContract
{
    /**
     * @api
     *
     * @param string $addressID identifies a civic address or a location
     * @param array<string,mixed>|CivicAddressRetrieveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CivicAddressGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $addressID,
        array|CivicAddressRetrieveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id identifies the resource
     * @param array<string,mixed>|CivicAddressListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CivicAddressListResponse>
     *
     * @throws APIException
     */
    public function list(
        string $id,
        array|CivicAddressListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
