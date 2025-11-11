<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\ManagedAccounts\ManagedAccountCreateParams;
use Telnyx\ManagedAccounts\ManagedAccountGetAllocatableGlobalOutboundChannelsResponse;
use Telnyx\ManagedAccounts\ManagedAccountGetResponse;
use Telnyx\ManagedAccounts\ManagedAccountListParams;
use Telnyx\ManagedAccounts\ManagedAccountListResponse;
use Telnyx\ManagedAccounts\ManagedAccountNewResponse;
use Telnyx\ManagedAccounts\ManagedAccountUpdateGlobalChannelLimitParams;
use Telnyx\ManagedAccounts\ManagedAccountUpdateGlobalChannelLimitResponse;
use Telnyx\ManagedAccounts\ManagedAccountUpdateParams;
use Telnyx\ManagedAccounts\ManagedAccountUpdateResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\ManagedAccountsContract;
use Telnyx\Services\ManagedAccounts\ActionsService;

final class ManagedAccountsService implements ManagedAccountsContract
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
     * Create a new managed account owned by the authenticated user. You need to be explictly approved by Telnyx in order to become a manager account.
     *
     * @param array{
     *   business_name: string,
     *   email?: string,
     *   managed_account_allow_custom_pricing?: bool,
     *   password?: string,
     *   rollup_billing?: bool,
     * }|ManagedAccountCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|ManagedAccountCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): ManagedAccountNewResponse {
        [$parsed, $options] = ManagedAccountCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
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
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): ManagedAccountGetResponse {
        // @phpstan-ignore-next-line;
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
     * @param array{
     *   managed_account_allow_custom_pricing?: bool
     * }|ManagedAccountUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|ManagedAccountUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): ManagedAccountUpdateResponse {
        [$parsed, $options] = ManagedAccountUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
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
     *   filter?: array{
     *     email?: array{contains?: string, eq?: string},
     *     organization_name?: array{contains?: string, eq?: string},
     *   },
     *   include_cancelled_accounts?: bool,
     *   page?: array{number?: int, size?: int},
     *   sort?: "created_at"|"email",
     * }|ManagedAccountListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|ManagedAccountListParams $params,
        ?RequestOptions $requestOptions = null,
    ): ManagedAccountListResponse {
        [$parsed, $options] = ManagedAccountListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'managed_accounts',
            query: $parsed,
            options: $options,
            convert: ManagedAccountListResponse::class,
        );
    }

    /**
     * @api
     *
     * Display information about allocatable global outbound channels for the current user. Only usable by account managers.
     *
     * @throws APIException
     */
    public function getAllocatableGlobalOutboundChannels(
        ?RequestOptions $requestOptions = null
    ): ManagedAccountGetAllocatableGlobalOutboundChannelsResponse {
        // @phpstan-ignore-next-line;
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
     * @param array{
     *   channel_limit?: int
     * }|ManagedAccountUpdateGlobalChannelLimitParams $params
     *
     * @throws APIException
     */
    public function updateGlobalChannelLimit(
        string $id,
        array|ManagedAccountUpdateGlobalChannelLimitParams $params,
        ?RequestOptions $requestOptions = null,
    ): ManagedAccountUpdateGlobalChannelLimitResponse {
        [$parsed, $options] = ManagedAccountUpdateGlobalChannelLimitParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'patch',
            path: ['managed_accounts/%1$s/update_global_channel_limit', $id],
            body: (object) $parsed,
            options: $options,
            convert: ManagedAccountUpdateGlobalChannelLimitResponse::class,
        );
    }
}
