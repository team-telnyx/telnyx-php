<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\ExternalConnections;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\ExternalConnections\CivicAddresses\CivicAddressGetResponse;
use Telnyx\ExternalConnections\CivicAddresses\CivicAddressListResponse;
use Telnyx\RequestOptions;

interface CivicAddressesContract
{
    /**
     * @api
     *
     * @param string $addressID identifies a civic address or a location
     * @param string $id identifies the resource
     *
     * @throws APIException
     */
    public function retrieve(
        string $addressID,
        string $id,
        ?RequestOptions $requestOptions = null
    ): CivicAddressGetResponse;

    /**
     * @api
     *
     * @param string $id identifies the resource
     * @param array{
     *   country?: list<string>
     * } $filter Filter parameter for civic addresses (deepObject style). Supports filtering by country.
     *
     * @throws APIException
     */
    public function list(
        string $id,
        ?array $filter = null,
        ?RequestOptions $requestOptions = null
    ): CivicAddressListResponse;
}
