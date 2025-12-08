<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\UserAddressesContract;
use Telnyx\UserAddresses\UserAddressCreateParams;
use Telnyx\UserAddresses\UserAddressGetResponse;
use Telnyx\UserAddresses\UserAddressListParams;
use Telnyx\UserAddresses\UserAddressListResponse;
use Telnyx\UserAddresses\UserAddressNewResponse;

final class UserAddressesService implements UserAddressesContract
{
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
     *   business_name: string,
     *   country_code: string,
     *   first_name: string,
     *   last_name: string,
     *   locality: string,
     *   street_address: string,
     *   administrative_area?: string,
     *   borough?: string,
     *   customer_reference?: string,
     *   extended_address?: string,
     *   neighborhood?: string,
     *   phone_number?: string,
     *   postal_code?: string,
     *   skip_address_verification?: string,
     * }|UserAddressCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|UserAddressCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): UserAddressNewResponse {
        [$parsed, $options] = UserAddressCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<UserAddressNewResponse> */
        $response = $this->client->request(
            method: 'post',
            path: 'user_addresses',
            body: (object) $parsed,
            options: $options,
            convert: UserAddressNewResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieves the details of an existing user address.
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): UserAddressGetResponse {
        /** @var BaseResponse<UserAddressGetResponse> */
        $response = $this->client->request(
            method: 'get',
            path: ['user_addresses/%1$s', $id],
            options: $requestOptions,
            convert: UserAddressGetResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns a list of your user addresses.
     *
     * @param array{
     *   filter?: array{
     *     customer_reference?: array{contains?: string, eq?: string},
     *     street_address?: array{contains?: string},
     *   },
     *   page?: array{number?: int, size?: int},
     *   sort?: 'created_at'|'first_name'|'last_name'|'business_name'|'street_address',
     * }|UserAddressListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|UserAddressListParams $params,
        ?RequestOptions $requestOptions = null
    ): UserAddressListResponse {
        [$parsed, $options] = UserAddressListParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<UserAddressListResponse> */
        $response = $this->client->request(
            method: 'get',
            path: 'user_addresses',
            query: $parsed,
            options: $options,
            convert: UserAddressListResponse::class,
        );

        return $response->parse();
    }
}
