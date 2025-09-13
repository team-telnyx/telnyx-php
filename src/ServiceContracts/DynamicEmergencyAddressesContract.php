<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
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
     *
     * @throws APIException
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
     * @param array<string, mixed> $params
     *
     * @return DynamicEmergencyAddressNewResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function createRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): DynamicEmergencyAddressNewResponse;

    /**
     * @api
     *
     * @return DynamicEmergencyAddressGetResponse<HasRawResponse>
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
     * @return DynamicEmergencyAddressGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveRaw(
        string $id,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): DynamicEmergencyAddressGetResponse;

    /**
     * @api
     *
     * @param Filter $filter Consolidated filter parameter (deepObject style). Originally: filter[status], filter[country_code]
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     *
     * @return DynamicEmergencyAddressListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function list(
        $filter = omit,
        $page = omit,
        ?RequestOptions $requestOptions = null
    ): DynamicEmergencyAddressListResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return DynamicEmergencyAddressListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): DynamicEmergencyAddressListResponse;

    /**
     * @api
     *
     * @return DynamicEmergencyAddressDeleteResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): DynamicEmergencyAddressDeleteResponse;

    /**
     * @api
     *
     * @return DynamicEmergencyAddressDeleteResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function deleteRaw(
        string $id,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): DynamicEmergencyAddressDeleteResponse;
}
