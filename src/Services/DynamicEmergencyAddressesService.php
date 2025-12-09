<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\DynamicEmergencyAddresses\DynamicEmergencyAddress;
use Telnyx\DynamicEmergencyAddresses\DynamicEmergencyAddressCreateParams\CountryCode;
use Telnyx\DynamicEmergencyAddresses\DynamicEmergencyAddressDeleteResponse;
use Telnyx\DynamicEmergencyAddresses\DynamicEmergencyAddressGetResponse;
use Telnyx\DynamicEmergencyAddresses\DynamicEmergencyAddressListParams\Filter\Status;
use Telnyx\DynamicEmergencyAddresses\DynamicEmergencyAddressNewResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\DynamicEmergencyAddressesContract;

final class DynamicEmergencyAddressesService implements DynamicEmergencyAddressesContract
{
    /**
     * @api
     */
    public DynamicEmergencyAddressesRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new DynamicEmergencyAddressesRawService($client);
    }

    /**
     * @api
     *
     * Creates a dynamic emergency address.
     *
     * @param 'US'|'CA'|'PR'|CountryCode $countryCode
     *
     * @throws APIException
     */
    public function create(
        string $administrativeArea,
        string|CountryCode $countryCode,
        string $houseNumber,
        string $locality,
        string $postalCode,
        string $streetName,
        ?string $extendedAddress = null,
        ?string $houseSuffix = null,
        ?string $streetPostDirectional = null,
        ?string $streetPreDirectional = null,
        ?string $streetSuffix = null,
        ?RequestOptions $requestOptions = null,
    ): DynamicEmergencyAddressNewResponse {
        $params = [
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
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns the dynamic emergency address based on the ID provided
     *
     * @param string $id Dynamic Emergency Address id
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): DynamicEmergencyAddressGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns the dynamic emergency addresses according to filters
     *
     * @param array{
     *   countryCode?: string, status?: 'pending'|'activated'|'rejected'|Status
     * } $filter Consolidated filter parameter (deepObject style). Originally: filter[status], filter[country_code]
     * @param array{
     *   number?: int, size?: int
     * } $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     *
     * @return DefaultPagination<DynamicEmergencyAddress>
     *
     * @throws APIException
     */
    public function list(
        ?array $filter = null,
        ?array $page = null,
        ?RequestOptions $requestOptions = null,
    ): DefaultPagination {
        $params = ['filter' => $filter, 'page' => $page];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Deletes the dynamic emergency address based on the ID provided
     *
     * @param string $id Dynamic Emergency Address id
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): DynamicEmergencyAddressDeleteResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($id, requestOptions: $requestOptions);

        return $response->parse();
    }
}
