<?php

declare(strict_types=1);

namespace Telnyx\Services\ExternalConnections;

use Telnyx\Client;
use Telnyx\ExternalConnections\CivicAddresses\CivicAddressGetResponse;
use Telnyx\ExternalConnections\CivicAddresses\CivicAddressListParams;
use Telnyx\ExternalConnections\CivicAddresses\CivicAddressListParams\Filter;
use Telnyx\ExternalConnections\CivicAddresses\CivicAddressListResponse;
use Telnyx\ExternalConnections\CivicAddresses\CivicAddressRetrieveParams;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\ExternalConnections\CivicAddressesContract;

use const Telnyx\Core\OMIT as omit;

final class CivicAddressesService implements CivicAddressesContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Return the details of an existing Civic Address with its Locations inside the 'data' attribute of the response.
     *
     * @param string $id
     */
    public function retrieve(
        string $addressID,
        $id,
        ?RequestOptions $requestOptions = null
    ): CivicAddressGetResponse {
        [$parsed, $options] = CivicAddressRetrieveParams::parseRequest(
            ['id' => $id],
            $requestOptions
        );
        $id = $parsed['id'];
        unset($parsed['id']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['external_connections/%1$s/civic_addresses/%2$s', $id, $addressID],
            options: $options,
            convert: CivicAddressGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Returns the civic addresses and locations from Microsoft Teams.
     *
     * @param Filter $filter Filter parameter for civic addresses (deepObject style). Supports filtering by country.
     */
    public function list(
        string $id,
        $filter = omit,
        ?RequestOptions $requestOptions = null
    ): CivicAddressListResponse {
        [$parsed, $options] = CivicAddressListParams::parseRequest(
            ['filter' => $filter],
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['external_connections/%1$s/civic_addresses', $id],
            query: $parsed,
            options: $options,
            convert: CivicAddressListResponse::class,
        );
    }
}
