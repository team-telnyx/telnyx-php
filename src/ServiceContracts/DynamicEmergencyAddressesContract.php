<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\DynamicEmergencyAddresses\DynamicEmergencyAddressCreateParams\CountryCode;
use Telnyx\DynamicEmergencyAddresses\DynamicEmergencyAddressDeleteResponse;
use Telnyx\DynamicEmergencyAddresses\DynamicEmergencyAddressGetResponse;
use Telnyx\DynamicEmergencyAddresses\DynamicEmergencyAddressListParams\Filter;
use Telnyx\DynamicEmergencyAddresses\DynamicEmergencyAddressListParams\Page;
use Telnyx\DynamicEmergencyAddresses\DynamicEmergencyAddressListResponse;
use Telnyx\DynamicEmergencyAddresses\DynamicEmergencyAddressNewResponse;
use Telnyx\RequestOptions;

use const Telnyx\Core\OMIT as omit;

interface DynamicEmergencyAddressesContract
{
    /**
     * @api
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
    ): DynamicEmergencyAddressNewResponse;

    /**
     * @api
     *
     * @return DynamicEmergencyAddressGetResponse<HasRawResponse>
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): DynamicEmergencyAddressGetResponse;

    /**
     * @api
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
    ): DynamicEmergencyAddressListResponse;

    /**
     * @api
     *
     * @return DynamicEmergencyAddressDeleteResponse<HasRawResponse>
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): DynamicEmergencyAddressDeleteResponse;
}
