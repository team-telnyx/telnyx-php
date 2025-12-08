<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Addresses\AddressCreateParams;
use Telnyx\Addresses\AddressDeleteResponse;
use Telnyx\Addresses\AddressGetResponse;
use Telnyx\Addresses\AddressListParams;
use Telnyx\Addresses\AddressListResponse;
use Telnyx\Addresses\AddressNewResponse;
use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AddressesContract;
use Telnyx\Services\Addresses\ActionsService;

final class AddressesService implements AddressesContract
{
    /**
     * @api
     */
    public ActionsService $actions;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->actions = new ActionsService($client);
    }

    /**
     * @api
     *
     * Creates an address.
     *
     * @param array{
     *   business_name: string,
     *   country_code: string,
     *   first_name: string,
     *   last_name: string,
     *   locality: string,
     *   street_address: string,
     *   address_book?: bool,
     *   administrative_area?: string,
     *   borough?: string,
     *   customer_reference?: string,
     *   extended_address?: string,
     *   neighborhood?: string,
     *   phone_number?: string,
     *   postal_code?: string,
     *   validate_address?: bool,
     * }|AddressCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|AddressCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): AddressNewResponse {
        [$parsed, $options] = AddressCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<AddressNewResponse> */
        $response = $this->client->request(
            method: 'post',
            path: 'addresses',
            body: (object) $parsed,
            options: $options,
            convert: AddressNewResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieves the details of an existing address.
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): AddressGetResponse {
        /** @var BaseResponse<AddressGetResponse> */
        $response = $this->client->request(
            method: 'get',
            path: ['addresses/%1$s', $id],
            options: $requestOptions,
            convert: AddressGetResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns a list of your addresses.
     *
     * @param array{
     *   filter?: array{
     *     address_book?: array{eq?: string},
     *     customer_reference?: string|array{contains?: string, eq?: string},
     *     street_address?: array{contains?: string},
     *     used_as_emergency?: string,
     *   },
     *   page?: array{number?: int, size?: int},
     *   sort?: 'created_at'|'first_name'|'last_name'|'business_name'|'street_address',
     * }|AddressListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|AddressListParams $params,
        ?RequestOptions $requestOptions = null
    ): AddressListResponse {
        [$parsed, $options] = AddressListParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<AddressListResponse> */
        $response = $this->client->request(
            method: 'get',
            path: 'addresses',
            query: $parsed,
            options: $options,
            convert: AddressListResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Deletes an existing address.
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): AddressDeleteResponse {
        /** @var BaseResponse<AddressDeleteResponse> */
        $response = $this->client->request(
            method: 'delete',
            path: ['addresses/%1$s', $id],
            options: $requestOptions,
            convert: AddressDeleteResponse::class,
        );

        return $response->parse();
    }
}
