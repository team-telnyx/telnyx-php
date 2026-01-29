<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultPagination;
use Telnyx\DynamicEmergencyAddresses\DynamicEmergencyAddress;
use Telnyx\DynamicEmergencyAddresses\DynamicEmergencyAddressCreateParams\CountryCode;
use Telnyx\DynamicEmergencyAddresses\DynamicEmergencyAddressDeleteResponse;
use Telnyx\DynamicEmergencyAddresses\DynamicEmergencyAddressGetResponse;
use Telnyx\DynamicEmergencyAddresses\DynamicEmergencyAddressListParams\Filter;
use Telnyx\DynamicEmergencyAddresses\DynamicEmergencyAddressListParams\Page;
use Telnyx\DynamicEmergencyAddresses\DynamicEmergencyAddressNewResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\DynamicEmergencyAddressesContract;

/**
 * @phpstan-import-type FilterShape from \Telnyx\DynamicEmergencyAddresses\DynamicEmergencyAddressListParams\Filter
 * @phpstan-import-type PageShape from \Telnyx\DynamicEmergencyAddresses\DynamicEmergencyAddressListParams\Page
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
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
     * @param CountryCode|value-of<CountryCode> $countryCode
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $administrativeArea,
        CountryCode|string $countryCode,
        string $houseNumber,
        string $locality,
        string $postalCode,
        string $streetName,
        ?string $extendedAddress = null,
        ?string $houseSuffix = null,
        ?string $streetPostDirectional = null,
        ?string $streetPreDirectional = null,
        ?string $streetSuffix = null,
        RequestOptions|array|null $requestOptions = null,
    ): DynamicEmergencyAddressNewResponse {
        $params = Util::removeNulls(
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
        );

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
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
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
     * @param Filter|FilterShape $filter Consolidated filter parameter (deepObject style). Originally: filter[status], filter[country_code]
     * @param Page|PageShape $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultPagination<DynamicEmergencyAddress>
     *
     * @throws APIException
     */
    public function list(
        Filter|array|null $filter = null,
        Page|array|null $page = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultPagination {
        $params = Util::removeNulls(['filter' => $filter, 'page' => $page]);

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
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): DynamicEmergencyAddressDeleteResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($id, requestOptions: $requestOptions);

        return $response->parse();
    }
}
