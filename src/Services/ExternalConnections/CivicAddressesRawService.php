<?php

declare(strict_types=1);

namespace Telnyx\Services\ExternalConnections;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\ExternalConnections\CivicAddresses\CivicAddressGetResponse;
use Telnyx\ExternalConnections\CivicAddresses\CivicAddressListParams;
use Telnyx\ExternalConnections\CivicAddresses\CivicAddressListResponse;
use Telnyx\ExternalConnections\CivicAddresses\CivicAddressRetrieveParams;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\ExternalConnections\CivicAddressesRawContract;

final class CivicAddressesRawService implements CivicAddressesRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Return the details of an existing Civic Address with its Locations inside the 'data' attribute of the response.
     *
     * @param string $addressID identifies a civic address or a location
     * @param array{id: string}|CivicAddressRetrieveParams $params
     *
     * @return BaseResponse<CivicAddressGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $addressID,
        array|CivicAddressRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = CivicAddressRetrieveParams::parseRequest(
            $params,
            $requestOptions,
        );
        $id = $parsed['id'];
        unset($parsed['id']);

        // @phpstan-ignore-next-line return.type
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
     * @param string $id identifies the resource
     * @param array{
     *   filter?: array{country?: list<string>}
     * }|CivicAddressListParams $params
     *
     * @return BaseResponse<CivicAddressListResponse>
     *
     * @throws APIException
     */
    public function list(
        string $id,
        array|CivicAddressListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = CivicAddressListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['external_connections/%1$s/civic_addresses', $id],
            query: $parsed,
            options: $options,
            convert: CivicAddressListResponse::class,
        );
    }
}
