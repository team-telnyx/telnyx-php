<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Addresses\Address;
use Telnyx\Addresses\AddressCreateParams;
use Telnyx\Addresses\AddressDeleteResponse;
use Telnyx\Addresses\AddressGetResponse;
use Telnyx\Addresses\AddressListParams;
use Telnyx\Addresses\AddressListParams\Filter;
use Telnyx\Addresses\AddressListParams\Sort;
use Telnyx\Addresses\AddressNewResponse;
use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AddressesRawContract;

/**
 * @phpstan-import-type FilterShape from \Telnyx\Addresses\AddressListParams\Filter
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class AddressesRawService implements AddressesRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Creates an address.
     *
     * @param array{
     *   businessName: string,
     *   countryCode: string,
     *   firstName: string,
     *   lastName: string,
     *   locality: string,
     *   streetAddress: string,
     *   addressBook?: bool,
     *   administrativeArea?: string,
     *   borough?: string,
     *   customerReference?: string,
     *   extendedAddress?: string,
     *   neighborhood?: string,
     *   phoneNumber?: string,
     *   postalCode?: string,
     *   validateAddress?: bool,
     * }|AddressCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AddressNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|AddressCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = AddressCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'addresses',
            body: (object) $parsed,
            options: $options,
            convert: AddressNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieves the details of an existing address.
     *
     * @param string $id address ID
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AddressGetResponse>
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
            path: ['addresses/%1$s', $id],
            options: $requestOptions,
            convert: AddressGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Returns a list of your addresses.
     *
     * @param array{
     *   filter?: Filter|FilterShape,
     *   pageNumber?: int,
     *   pageSize?: int,
     *   sort?: Sort|value-of<Sort>,
     * }|AddressListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<Address>>
     *
     * @throws APIException
     */
    public function list(
        array|AddressListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = AddressListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'addresses',
            query: Util::array_transform_keys(
                $parsed,
                ['pageNumber' => 'page[number]', 'pageSize' => 'page[size]']
            ),
            options: $options,
            convert: Address::class,
            page: DefaultFlatPagination::class,
        );
    }

    /**
     * @api
     *
     * Deletes an existing address.
     *
     * @param string $id address ID
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AddressDeleteResponse>
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
            path: ['addresses/%1$s', $id],
            options: $requestOptions,
            convert: AddressDeleteResponse::class,
        );
    }
}
