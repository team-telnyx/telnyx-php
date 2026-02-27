<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\ManagedAccounts\ManagedAccountCreateParams;
use Telnyx\ManagedAccounts\ManagedAccountGetAllocatableGlobalOutboundChannelsResponse;
use Telnyx\ManagedAccounts\ManagedAccountGetResponse;
use Telnyx\ManagedAccounts\ManagedAccountListParams;
use Telnyx\ManagedAccounts\ManagedAccountListParams\Filter;
use Telnyx\ManagedAccounts\ManagedAccountListParams\Sort;
use Telnyx\ManagedAccounts\ManagedAccountListResponse;
use Telnyx\ManagedAccounts\ManagedAccountNewResponse;
use Telnyx\ManagedAccounts\ManagedAccountUpdateGlobalChannelLimitParams;
use Telnyx\ManagedAccounts\ManagedAccountUpdateGlobalChannelLimitResponse;
use Telnyx\ManagedAccounts\ManagedAccountUpdateParams;
use Telnyx\ManagedAccounts\ManagedAccountUpdateResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\ManagedAccountsRawContract;

/**
 * Managed Accounts operations.
 *
 * @phpstan-import-type FilterShape from \Telnyx\ManagedAccounts\ManagedAccountListParams\Filter
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class ManagedAccountsRawService implements ManagedAccountsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create a new managed account owned by the authenticated user. You need to be explictly approved by Telnyx in order to become a manager account.
     *
     * @param array{
     *   businessName: string,
     *   email?: string,
     *   managedAccountAllowCustomPricing?: bool,
     *   password?: string,
     *   rollupBilling?: bool,
     * }|ManagedAccountCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ManagedAccountNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|ManagedAccountCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ManagedAccountCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'managed_accounts',
            body: (object) $parsed,
            options: $options,
            convert: ManagedAccountNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieves the details of a single managed account.
     *
     * @param string $id Managed Account User ID
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ManagedAccountGetResponse>
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
            path: ['managed_accounts/%1$s', $id],
            options: $requestOptions,
            convert: ManagedAccountGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Update a single managed account.
     *
     * @param string $id Managed Account User ID
     * @param array{
     *   managedAccountAllowCustomPricing?: bool
     * }|ManagedAccountUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ManagedAccountUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|ManagedAccountUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ManagedAccountUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: ['managed_accounts/%1$s', $id],
            body: (object) $parsed,
            options: $options,
            convert: ManagedAccountUpdateResponse::class,
        );
    }

    /**
     * @api
     *
     * Lists the accounts managed by the current user. Users need to be explictly approved by Telnyx in order to become manager accounts.
     *
     * @param array{
     *   filter?: Filter|FilterShape,
     *   includeCancelledAccounts?: bool,
     *   pageNumber?: int,
     *   pageSize?: int,
     *   sort?: Sort|value-of<Sort>,
     * }|ManagedAccountListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<ManagedAccountListResponse>>
     *
     * @throws APIException
     */
    public function list(
        array|ManagedAccountListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ManagedAccountListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'managed_accounts',
            query: Util::array_transform_keys(
                $parsed,
                [
                    'includeCancelledAccounts' => 'include_cancelled_accounts',
                    'pageNumber' => 'page[number]',
                    'pageSize' => 'page[size]',
                ],
            ),
            options: $options,
            convert: ManagedAccountListResponse::class,
            page: DefaultFlatPagination::class,
        );
    }

    /**
     * @api
     *
     * Display information about allocatable global outbound channels for the current user. Only usable by account managers.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ManagedAccountGetAllocatableGlobalOutboundChannelsResponse>
     *
     * @throws APIException
     */
    public function getAllocatableGlobalOutboundChannels(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'managed_accounts/allocatable_global_outbound_channels',
            options: $requestOptions,
            convert: ManagedAccountGetAllocatableGlobalOutboundChannelsResponse::class,
        );
    }

    /**
     * @api
     *
     * Update the amount of allocatable global outbound channels allocated to a specific managed account.
     *
     * @param string $id Managed Account User ID
     * @param array{
     *   channelLimit?: int
     * }|ManagedAccountUpdateGlobalChannelLimitParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ManagedAccountUpdateGlobalChannelLimitResponse>
     *
     * @throws APIException
     */
    public function updateGlobalChannelLimit(
        string $id,
        array|ManagedAccountUpdateGlobalChannelLimitParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ManagedAccountUpdateGlobalChannelLimitParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: ['managed_accounts/%1$s/update_global_channel_limit', $id],
            body: (object) $parsed,
            options: $options,
            convert: ManagedAccountUpdateGlobalChannelLimitResponse::class,
        );
    }
}
