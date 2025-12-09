<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DynamicEmergencyAddresses\DynamicEmergencyAddressCreateParams\CountryCode;
use Telnyx\DynamicEmergencyAddresses\DynamicEmergencyAddressDeleteResponse;
use Telnyx\DynamicEmergencyAddresses\DynamicEmergencyAddressGetResponse;
use Telnyx\DynamicEmergencyAddresses\DynamicEmergencyAddressListParams\Filter\Status;
use Telnyx\DynamicEmergencyAddresses\DynamicEmergencyAddressListResponse;
use Telnyx\DynamicEmergencyAddresses\DynamicEmergencyAddressNewResponse;
use Telnyx\RequestOptions;

interface DynamicEmergencyAddressesContract
{
    /**
     * @api
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
    ): DynamicEmergencyAddressNewResponse;

    /**
     * @api
     *
     * @param string $id Dynamic Emergency Address id
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): DynamicEmergencyAddressGetResponse;

    /**
     * @api
     *
     * @param array{
     *   countryCode?: string, status?: 'pending'|'activated'|'rejected'|Status
     * } $filter Consolidated filter parameter (deepObject style). Originally: filter[status], filter[country_code]
     * @param array{
     *   number?: int, size?: int
     * } $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     *
     * @throws APIException
     */
    public function list(
        ?array $filter = null,
        ?array $page = null,
        ?RequestOptions $requestOptions = null,
    ): DynamicEmergencyAddressListResponse;

    /**
     * @api
     *
     * @param string $id Dynamic Emergency Address id
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): DynamicEmergencyAddressDeleteResponse;
}
