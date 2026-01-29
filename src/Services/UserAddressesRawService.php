<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\UserAddressesRawContract;
use Telnyx\UserAddresses\UserAddress;
use Telnyx\UserAddresses\UserAddressCreateParams;
use Telnyx\UserAddresses\UserAddressGetResponse;
use Telnyx\UserAddresses\UserAddressListParams;
use Telnyx\UserAddresses\UserAddressListParams\Filter;
use Telnyx\UserAddresses\UserAddressListParams\Page;
use Telnyx\UserAddresses\UserAddressListParams\Sort;
use Telnyx\UserAddresses\UserAddressNewResponse;

/**
 * @phpstan-import-type FilterShape from \Telnyx\UserAddresses\UserAddressListParams\Filter
 * @phpstan-import-type PageShape from \Telnyx\UserAddresses\UserAddressListParams\Page
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
     *   filter?: Filter|FilterShape, page?: Page|PageShape, sort?: Sort|value-of<Sort>
     * }|UserAddressListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultPagination<UserAddress>>
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
            query: $parsed,
            options: $options,
            convert: UserAddress::class,
            page: DefaultPagination::class,
        );
    }
}
