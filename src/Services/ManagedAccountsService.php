<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\ManagedAccounts\ManagedAccountCreateParams;
use Telnyx\ManagedAccounts\ManagedAccountGetAllocatableGlobalOutboundChannelsResponse;
use Telnyx\ManagedAccounts\ManagedAccountGetResponse;
use Telnyx\ManagedAccounts\ManagedAccountListParams;
use Telnyx\ManagedAccounts\ManagedAccountListParams\Filter;
use Telnyx\ManagedAccounts\ManagedAccountListParams\Page;
use Telnyx\ManagedAccounts\ManagedAccountListParams\Sort;
use Telnyx\ManagedAccounts\ManagedAccountListResponse;
use Telnyx\ManagedAccounts\ManagedAccountNewResponse;
use Telnyx\ManagedAccounts\ManagedAccountUpdateGlobalChannelLimitParams;
use Telnyx\ManagedAccounts\ManagedAccountUpdateGlobalChannelLimitResponse;
use Telnyx\ManagedAccounts\ManagedAccountUpdateParams;
use Telnyx\ManagedAccounts\ManagedAccountUpdateResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\ManagedAccountsContract;
use Telnyx\Services\ManagedAccounts\ActionsService;

use const Telnyx\Core\OMIT as omit;

final class ManagedAccountsService implements ManagedAccountsContract
{
    /**
     * @@api
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
     * @param string $businessName the name of the business for which the new managed account is being created, that will be used as the managed accounts's organization's name
     * @param string $email The email address for the managed account. If not provided, the email address will be generated based on the email address of the manager account.
     * @param bool $managedAccountAllowCustomPricing Boolean value that indicates if the managed account is able to have custom pricing set for it or not. If false, uses the pricing of the manager account. Defaults to false. This value may be changed after creation, but there may be time lag between when the value is changed and pricing changes take effect.
     * @param string $password Password for the managed account. If a password is not supplied, the account will not be able to be signed into directly. (A password reset may still be performed later to enable sign-in via password.)
     * @param bool $rollupBilling Boolean value that indicates if the billing information and charges to the managed account "roll up" to the manager account. If true, the managed account will not have its own balance and will use the shared balance with the manager account. This value cannot be changed after account creation without going through Telnyx support as changes require manual updates to the account ledger. Defaults to false.
     *
     * @throws APIException
     */
    public function create(
        $businessName,
        $email = omit,
        $managedAccountAllowCustomPricing = omit,
        $password = omit,
        $rollupBilling = omit,
        ?RequestOptions $requestOptions = null,
    ): ManagedAccountNewResponse {
        $params = [
            'businessName' => $businessName,
            'email' => $email,
            'managedAccountAllowCustomPricing' => $managedAccountAllowCustomPricing,
            'password' => $password,
            'rollupBilling' => $rollupBilling,
        ];

        return $this->createRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function createRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): ManagedAccountNewResponse {
        [$parsed, $options] = ManagedAccountCreateParams::parseRequest(
            $params,
            $requestOptions
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
     * @param bool $managedAccountAllowCustomPricing Boolean value that indicates if the managed account is able to have custom pricing set for it or not. If false, uses the pricing of the manager account. Defaults to false. This value may be changed, but there may be time lag between when the value is changed and pricing changes take effect.
     *
     * @throws APIException
     */
    public function update(
        string $id,
        $managedAccountAllowCustomPricing = omit,
        ?RequestOptions $requestOptions = null,
    ): ManagedAccountUpdateResponse {
        $params = [
            'managedAccountAllowCustomPricing' => $managedAccountAllowCustomPricing,
        ];

        return $this->updateRaw($id, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function updateRaw(
        string $id,
        array $params,
        ?RequestOptions $requestOptions = null
    ): ManagedAccountUpdateResponse {
        [$parsed, $options] = ManagedAccountUpdateParams::parseRequest(
            $params,
            $requestOptions
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
     * @param Filter $filter Consolidated filter parameter (deepObject style). Originally: filter[email][contains], filter[email][eq], filter[organization_name][contains], filter[organization_name][eq]
     * @param bool $includeCancelledAccounts specifies if cancelled accounts should be included in the results
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[number], page[size]
     * @param Sort|value-of<Sort> $sort Specifies the sort order for results. By default sorting direction is ascending. To have the results sorted in descending order add the <code> -</code> prefix.<br/><br/>
     * That is: <ul>
     *   <li>
     *     <code>email</code>: sorts the result by the
     *     <code>email</code> field in ascending order.
     *   </li>
     *
     *   <li>
     *     <code>-email</code>: sorts the result by the
     *     <code>email</code> field in descending order.
     *   </li>
     * </ul> <br/> If not given, results are sorted by <code>created_at</code> in descending order.
     *
     * @throws APIException
     */
    public function list(
        $filter = omit,
        $includeCancelledAccounts = omit,
        $page = omit,
        $sort = omit,
        ?RequestOptions $requestOptions = null,
    ): ManagedAccountListResponse {
        $params = [
            'filter' => $filter,
            'includeCancelledAccounts' => $includeCancelledAccounts,
            'page' => $page,
            'sort' => $sort,
        ];

        return $this->listRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): ManagedAccountListResponse {
        [$parsed, $options] = ManagedAccountListParams::parseRequest(
            $params,
            $requestOptions
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
     * @param int $channelLimit Integer value that indicates the number of allocatable global outbound channels that should be allocated to the managed account. Must be 0 or more. If the value is 0 then the account will have no usable channels and will not be able to perform outbound calling.
     *
     * @throws APIException
     */
    public function updateGlobalChannelLimit(
        string $id,
        $channelLimit = omit,
        ?RequestOptions $requestOptions = null
    ): ManagedAccountUpdateGlobalChannelLimitResponse {
        $params = ['channelLimit' => $channelLimit];

        return $this->updateGlobalChannelLimitRaw($id, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function updateGlobalChannelLimitRaw(
        string $id,
        array $params,
        ?RequestOptions $requestOptions = null
    ): ManagedAccountUpdateGlobalChannelLimitResponse {
        [
            $parsed, $options,
        ] = ManagedAccountUpdateGlobalChannelLimitParams::parseRequest(
            $params,
            $requestOptions
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
