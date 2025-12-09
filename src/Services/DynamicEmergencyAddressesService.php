<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DynamicEmergencyAddresses\DynamicEmergencyAddressCreateParams;
use Telnyx\DynamicEmergencyAddresses\DynamicEmergencyAddressCreateParams\CountryCode;
use Telnyx\DynamicEmergencyAddresses\DynamicEmergencyAddressDeleteResponse;
use Telnyx\DynamicEmergencyAddresses\DynamicEmergencyAddressGetResponse;
use Telnyx\DynamicEmergencyAddresses\DynamicEmergencyAddressListParams;
use Telnyx\DynamicEmergencyAddresses\DynamicEmergencyAddressListParams\Filter\Status;
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
     *   administrativeArea: string,
     *   countryCode: 'US'|'CA'|'PR'|CountryCode,
     *   houseNumber: string,
     *   locality: string,
     *   postalCode: string,
     *   streetName: string,
     *   extendedAddress?: string,
     *   houseSuffix?: string,
     *   streetPostDirectional?: string,
     *   streetPreDirectional?: string,
     *   streetSuffix?: string,
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

        /** @var BaseResponse<DynamicEmergencyAddressNewResponse> */
        $response = $this->client->request(
            method: 'post',
            path: 'dynamic_emergency_addresses',
            body: (object) $parsed,
            options: $options,
            convert: DynamicEmergencyAddressNewResponse::class,
        );

        return $response->parse();
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
        /** @var BaseResponse<DynamicEmergencyAddressGetResponse> */
        $response = $this->client->request(
            method: 'get',
            path: ['dynamic_emergency_addresses/%1$s', $id],
            options: $requestOptions,
            convert: DynamicEmergencyAddressGetResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns the dynamic emergency addresses according to filters
     *
     * @param array{
     *   filter?: array{
     *     countryCode?: string, status?: 'pending'|'activated'|'rejected'|Status
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

        /** @var BaseResponse<DynamicEmergencyAddressListResponse> */
        $response = $this->client->request(
            method: 'get',
            path: 'dynamic_emergency_addresses',
            query: $parsed,
            options: $options,
            convert: DynamicEmergencyAddressListResponse::class,
        );

        return $response->parse();
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
        /** @var BaseResponse<DynamicEmergencyAddressDeleteResponse> */
        $response = $this->client->request(
            method: 'delete',
            path: ['dynamic_emergency_addresses/%1$s', $id],
            options: $requestOptions,
            convert: DynamicEmergencyAddressDeleteResponse::class,
        );

        return $response->parse();
    }
}
