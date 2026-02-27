<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\UserAddressesRawContract;
use Telnyx\UserAddresses\UserAddress;
use Telnyx\UserAddresses\UserAddressCreateParams;
use Telnyx\UserAddresses\UserAddressGetResponse;
use Telnyx\UserAddresses\UserAddressListParams;
use Telnyx\UserAddresses\UserAddressListParams\Filter;
use Telnyx\UserAddresses\UserAddressListParams\Sort;
use Telnyx\UserAddresses\UserAddressNewResponse;

/**
 * Operations for working with UserAddress records. UserAddress records are stored addresses that users can use for non-emergency-calling purposes, such as for shipping addresses for orders of wireless SIMs (or other physical items). They cannot be used for emergency calling and are distinct from Address records, which are used on phone numbers.
 *
 * @phpstan-import-type FilterShape from \Telnyx\UserAddresses\UserAddressListParams\Filter
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class UserAddressesRawService implements UserAddressesRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Creates a user address.
     *
     * @param array{
     *   businessName: string,
     *   countryCode: string,
     *   firstName: string,
     *   lastName: string,
     *   locality: string,
     *   streetAddress: string,
     *   administrativeArea?: string,
     *   borough?: string,
     *   customerReference?: string,
     *   extendedAddress?: string,
     *   neighborhood?: string,
     *   phoneNumber?: string,
     *   postalCode?: string,
     *   skipAddressVerification?: bool,
     * }|UserAddressCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<UserAddressNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|UserAddressCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = UserAddressCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'user_addresses',
            body: (object) $parsed,
            options: $options,
            convert: UserAddressNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieves the details of an existing user address.
     *
     * @param string $id user address ID
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<UserAddressGetResponse>
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
            path: ['user_addresses/%1$s', $id],
            options: $requestOptions,
            convert: UserAddressGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Returns a list of your user addresses.
     *
     * @param array{
     *   filter?: Filter|FilterShape,
     *   pageNumber?: int,
     *   pageSize?: int,
     *   sort?: Sort|value-of<Sort>,
     * }|UserAddressListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<UserAddress>>
     *
     * @throws APIException
     */
    public function list(
        array|UserAddressListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = UserAddressListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'user_addresses',
            query: Util::array_transform_keys(
                $parsed,
                ['pageNumber' => 'page[number]', 'pageSize' => 'page[size]']
            ),
            options: $options,
            convert: UserAddress::class,
            page: DefaultFlatPagination::class,
        );
    }
}
