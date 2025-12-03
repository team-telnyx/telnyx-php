<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DynamicEmergencyAddresses\DynamicEmergencyAddressCreateParams;
use Telnyx\DynamicEmergencyAddresses\DynamicEmergencyAddressDeleteResponse;
use Telnyx\DynamicEmergencyAddresses\DynamicEmergencyAddressGetResponse;
use Telnyx\DynamicEmergencyAddresses\DynamicEmergencyAddressListParams;
use Telnyx\DynamicEmergencyAddresses\DynamicEmergencyAddressListResponse;
use Telnyx\DynamicEmergencyAddresses\DynamicEmergencyAddressNewResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\DynamicEmergencyAddressesContract;

final class DynamicEmergencyAddressesService implements DynamicEmergencyAddressesContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Creates a dynamic emergency address.
     *
     * @param array{
     *   administrative_area: string,
     *   country_code: 'US'|'CA'|'PR',
     *   house_number: string,
     *   locality: string,
     *   postal_code: string,
     *   street_name: string,
     *   extended_address?: string,
     *   house_suffix?: string,
     *   street_post_directional?: string,
     *   street_pre_directional?: string,
     *   street_suffix?: string,
     * }|DynamicEmergencyAddressCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|DynamicEmergencyAddressCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): DynamicEmergencyAddressNewResponse {
        [$parsed, $options] = DynamicEmergencyAddressCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'dynamic_emergency_addresses',
            body: (object) $parsed,
            options: $options,
            convert: DynamicEmergencyAddressNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Returns the dynamic emergency address based on the ID provided
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): DynamicEmergencyAddressGetResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['dynamic_emergency_addresses/%1$s', $id],
            options: $requestOptions,
            convert: DynamicEmergencyAddressGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Returns the dynamic emergency addresses according to filters
     *
     * @param array{
     *   filter?: array{
     *     country_code?: string, status?: 'pending'|'activated'|'rejected'
     *   },
     *   page?: array{number?: int, size?: int},
     * }|DynamicEmergencyAddressListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|DynamicEmergencyAddressListParams $params,
        ?RequestOptions $requestOptions = null,
    ): DynamicEmergencyAddressListResponse {
        [$parsed, $options] = DynamicEmergencyAddressListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'dynamic_emergency_addresses',
            query: $parsed,
            options: $options,
            convert: DynamicEmergencyAddressListResponse::class,
        );
    }

    /**
     * @api
     *
     * Deletes the dynamic emergency address based on the ID provided
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): DynamicEmergencyAddressDeleteResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['dynamic_emergency_addresses/%1$s', $id],
            options: $requestOptions,
            convert: DynamicEmergencyAddressDeleteResponse::class,
        );
    }
}
