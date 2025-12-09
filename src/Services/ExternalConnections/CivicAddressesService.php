<?php

declare(strict_types=1);

namespace Telnyx\Services\ExternalConnections;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\ExternalConnections\CivicAddresses\CivicAddressGetResponse;
use Telnyx\ExternalConnections\CivicAddresses\CivicAddressListResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\ExternalConnections\CivicAddressesContract;

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
     *
     * @throws APIException
     */
    public function retrieve(
        string $addressID,
        string $id,
        ?RequestOptions $requestOptions = null
    ): CivicAddressGetResponse {
        $params = ['id' => $id];

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
    ): CivicAddressListResponse {
        $params = ['filter' => $filter];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
