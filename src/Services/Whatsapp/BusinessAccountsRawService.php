<?php

declare(strict_types=1);

namespace Telnyx\Services\Whatsapp;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Whatsapp\BusinessAccountsRawContract;
use Telnyx\Whatsapp\BusinessAccounts\BusinessAccountGetResponse;
use Telnyx\Whatsapp\BusinessAccounts\BusinessAccountListParams;
use Telnyx\Whatsapp\BusinessAccounts\BusinessAccountListResponse;

/**
 * Manage Whatsapp business accounts.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class BusinessAccountsRawService implements BusinessAccountsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Get a single Whatsapp Business Account
     *
     * @param string $id Whatsapp Business Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BusinessAccountGetResponse>
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
            path: ['v2/whatsapp/business_accounts/%1$s', $id],
            options: $requestOptions,
            convert: BusinessAccountGetResponse::class,
        );
    }

    /**
     * @api
     *
     * List Whatsapp Business Accounts
     *
     * @param array{pageNumber?: int, pageSize?: int}|BusinessAccountListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<BusinessAccountListResponse>>
     *
     * @throws APIException
     */
    public function list(
        array|BusinessAccountListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = BusinessAccountListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'v2/whatsapp/business_accounts',
            query: Util::array_transform_keys(
                $parsed,
                ['pageNumber' => 'page[number]', 'pageSize' => 'page[size]']
            ),
            options: $options,
            convert: BusinessAccountListResponse::class,
            page: DefaultFlatPagination::class,
        );
    }

    /**
     * @api
     *
     * Delete a Whatsapp Business Account
     *
     * @param string $id Whatsapp Business Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
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
            path: ['v2/whatsapp/business_accounts/%1$s', $id],
            options: $requestOptions,
            convert: null,
        );
    }
}
