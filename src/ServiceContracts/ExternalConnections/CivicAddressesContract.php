<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\ExternalConnections;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\ExternalConnections\CivicAddresses\CivicAddressGetResponse;
use Telnyx\ExternalConnections\CivicAddresses\CivicAddressListParams\Filter;
use Telnyx\ExternalConnections\CivicAddresses\CivicAddressListResponse;
use Telnyx\RequestOptions;

use const Telnyx\Core\OMIT as omit;

interface CivicAddressesContract
{
    /**
     * @api
     *
     * @param string $id
     *
     * @throws APIException
     */
    public function retrieve(
        string $addressID,
        $id,
        ?RequestOptions $requestOptions = null
    ): CivicAddressGetResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function retrieveRaw(
        string $addressID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): CivicAddressGetResponse;

    /**
     * @api
     *
     * @param Filter $filter Filter parameter for civic addresses (deepObject style). Supports filtering by country.
     *
     * @throws APIException
     */
    public function list(
        string $id,
        $filter = omit,
        ?RequestOptions $requestOptions = null
    ): CivicAddressListResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function listRaw(
        string $id,
        array $params,
        ?RequestOptions $requestOptions = null
    ): CivicAddressListResponse;
}
