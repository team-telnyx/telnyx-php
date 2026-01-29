<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\DynamicEmergencyAddresses\DynamicEmergencyAddress;
use Telnyx\DynamicEmergencyAddresses\DynamicEmergencyAddressCreateParams;
use Telnyx\DynamicEmergencyAddresses\DynamicEmergencyAddressCreateParams\CountryCode;
use Telnyx\DynamicEmergencyAddresses\DynamicEmergencyAddressDeleteResponse;
use Telnyx\DynamicEmergencyAddresses\DynamicEmergencyAddressGetResponse;
use Telnyx\DynamicEmergencyAddresses\DynamicEmergencyAddressListParams;
use Telnyx\DynamicEmergencyAddresses\DynamicEmergencyAddressListParams\Filter;
use Telnyx\DynamicEmergencyAddresses\DynamicEmergencyAddressListParams\Page;
use Telnyx\DynamicEmergencyAddresses\DynamicEmergencyAddressNewResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\DynamicEmergencyAddressesRawContract;

/**
 * @phpstan-import-type FilterShape from \Telnyx\DynamicEmergencyAddresses\DynamicEmergencyAddressListParams\Filter
 * @phpstan-import-type PageShape from \Telnyx\DynamicEmergencyAddresses\DynamicEmergencyAddressListParams\Page
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class DynamicEmergencyAddressesRawService implements DynamicEmergencyAddressesRawContract
{
    // @phpstan-ignore-next-line
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
     *   countryCode: CountryCode|value-of<CountryCode>,
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
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DynamicEmergencyAddressNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|DynamicEmergencyAddressCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
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
     * @param string $id Dynamic Emergency Address id
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DynamicEmergencyAddressGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
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
     *   filter?: Filter|FilterShape, page?: Page|PageShape
     * }|DynamicEmergencyAddressListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultPagination<DynamicEmergencyAddress>>
     *
     * @throws APIException
     */
    public function list(
        array|DynamicEmergencyAddressListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
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
            convert: DynamicEmergencyAddress::class,
            page: DefaultPagination::class,
        );
    }

    /**
     * @api
     *
     * Deletes the dynamic emergency address based on the ID provided
     *
     * @param string $id Dynamic Emergency Address id
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DynamicEmergencyAddressDeleteResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['dynamic_emergency_addresses/%1$s', $id],
            options: $requestOptions,
            convert: DynamicEmergencyAddressDeleteResponse::class,
        );
    }
}
