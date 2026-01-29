<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\ExternalConnections;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\ExternalConnections\CivicAddresses\CivicAddressGetResponse;
use Telnyx\ExternalConnections\CivicAddresses\CivicAddressListParams\Filter;
use Telnyx\ExternalConnections\CivicAddresses\CivicAddressListResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type FilterShape from \Telnyx\ExternalConnections\CivicAddresses\CivicAddressListParams\Filter
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface CivicAddressesContract
{
    /**
     * @api
     *
     * @param string $addressID identifies a civic address or a location
     * @param string $id identifies the resource
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $addressID,
        string $id,
        RequestOptions|array|null $requestOptions = null,
    ): CivicAddressGetResponse;

    /**
     * @api
     *
     * @param string $id identifies the resource
     * @param Filter|FilterShape $filter Filter parameter for civic addresses (deepObject style). Supports filtering by country.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        string $id,
        Filter|array|null $filter = null,
        RequestOptions|array|null $requestOptions = null,
    ): CivicAddressListResponse;
}
