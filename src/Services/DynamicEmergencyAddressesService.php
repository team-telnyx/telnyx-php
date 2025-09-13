<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\DynamicEmergencyAddresses\DynamicEmergencyAddressCreateParams;
use Telnyx\DynamicEmergencyAddresses\DynamicEmergencyAddressCreateParams\CountryCode;
use Telnyx\DynamicEmergencyAddresses\DynamicEmergencyAddressDeleteResponse;
use Telnyx\DynamicEmergencyAddresses\DynamicEmergencyAddressGetResponse;
use Telnyx\DynamicEmergencyAddresses\DynamicEmergencyAddressListParams;
use Telnyx\DynamicEmergencyAddresses\DynamicEmergencyAddressListParams\Filter;
use Telnyx\DynamicEmergencyAddresses\DynamicEmergencyAddressListParams\Page;
use Telnyx\DynamicEmergencyAddresses\DynamicEmergencyAddressListResponse;
use Telnyx\DynamicEmergencyAddresses\DynamicEmergencyAddressNewResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\DynamicEmergencyAddressesContract;

use const Telnyx\Core\OMIT as omit;

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
     * @param string $administrativeArea
     * @param CountryCode|value-of<CountryCode> $countryCode
     * @param string $houseNumber
     * @param string $locality
     * @param string $postalCode
     * @param string $streetName
     * @param string $extendedAddress
     * @param string $houseSuffix
     * @param string $streetPostDirectional
     * @param string $streetPreDirectional
     * @param string $streetSuffix
     *
     * @return DynamicEmergencyAddressNewResponse<HasRawResponse>
     */
    public function create(
        $administrativeArea,
        $countryCode,
        $houseNumber,
        $locality,
        $postalCode,
        $streetName,
        $extendedAddress = omit,
        $houseSuffix = omit,
        $streetPostDirectional = omit,
        $streetPreDirectional = omit,
        $streetSuffix = omit,
        ?RequestOptions $requestOptions = null,
    ): DynamicEmergencyAddressNewResponse {
        [$parsed, $options] = DynamicEmergencyAddressCreateParams::parseRequest(
            [
                'administrativeArea' => $administrativeArea,
                'countryCode' => $countryCode,
                'houseNumber' => $houseNumber,
                'locality' => $locality,
                'postalCode' => $postalCode,
                'streetName' => $streetName,
                'extendedAddress' => $extendedAddress,
                'houseSuffix' => $houseSuffix,
                'streetPostDirectional' => $streetPostDirectional,
                'streetPreDirectional' => $streetPreDirectional,
                'streetSuffix' => $streetSuffix,
            ],
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
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
     * @return DynamicEmergencyAddressGetResponse<HasRawResponse>
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): DynamicEmergencyAddressGetResponse {
        // @phpstan-ignore-next-line;
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
     * @param Filter $filter Consolidated filter parameter (deepObject style). Originally: filter[status], filter[country_code]
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     *
     * @return DynamicEmergencyAddressListResponse<HasRawResponse>
     */
    public function list(
        $filter = omit,
        $page = omit,
        ?RequestOptions $requestOptions = null
    ): DynamicEmergencyAddressListResponse {
        [$parsed, $options] = DynamicEmergencyAddressListParams::parseRequest(
            ['filter' => $filter, 'page' => $page],
            $requestOptions
        );

        // @phpstan-ignore-next-line;
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
     * @return DynamicEmergencyAddressDeleteResponse<HasRawResponse>
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): DynamicEmergencyAddressDeleteResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: ['dynamic_emergency_addresses/%1$s', $id],
            options: $requestOptions,
            convert: DynamicEmergencyAddressDeleteResponse::class,
        );
    }
}
