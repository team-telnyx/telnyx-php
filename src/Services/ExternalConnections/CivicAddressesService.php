<?php

declare(strict_types=1);

namespace Telnyx\Services\ExternalConnections;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\ExternalConnections\CivicAddresses\CivicAddressGetResponse;
use Telnyx\ExternalConnections\CivicAddresses\CivicAddressListParams\Filter;
use Telnyx\ExternalConnections\CivicAddresses\CivicAddressListResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\ExternalConnections\CivicAddressesContract;

/**
 * External Connections operations.
 *
 * @phpstan-import-type FilterShape from \Telnyx\ExternalConnections\CivicAddresses\CivicAddressListParams\Filter
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class CivicAddressesService implements CivicAddressesContract
{
    /**
     * @api
     */
    public CivicAddressesRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new CivicAddressesRawService($client);
    }

    /**
     * @api
     *
     * Return the details of an existing Civic Address with its Locations inside the 'data' attribute of the response.
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
    ): CivicAddressGetResponse {
        $params = Util::removeNulls(['id' => $id]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($addressID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns the civic addresses and locations from Microsoft Teams.
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
    ): CivicAddressListResponse {
        $params = Util::removeNulls(['filter' => $filter]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
