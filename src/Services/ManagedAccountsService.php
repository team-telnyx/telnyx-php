<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\ManagedAccounts\ManagedAccountGetAllocatableGlobalOutboundChannelsResponse;
use Telnyx\ManagedAccounts\ManagedAccountGetResponse;
use Telnyx\ManagedAccounts\ManagedAccountListParams\Filter;
use Telnyx\ManagedAccounts\ManagedAccountListParams\Sort;
use Telnyx\ManagedAccounts\ManagedAccountListResponse;
use Telnyx\ManagedAccounts\ManagedAccountNewResponse;
use Telnyx\ManagedAccounts\ManagedAccountUpdateGlobalChannelLimitResponse;
use Telnyx\ManagedAccounts\ManagedAccountUpdateResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\ManagedAccountsContract;
use Telnyx\Services\ManagedAccounts\ActionsService;

/**
 * Managed Accounts operations.
 *
 * @phpstan-import-type FilterShape from \Telnyx\ManagedAccounts\ManagedAccountListParams\Filter
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class ManagedAccountsService implements ManagedAccountsContract
{
    /**
     * @api
     */
    public ManagedAccountsRawService $raw;

    /**
     * @api
     */
    public ActionsService $actions;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new ManagedAccountsRawService($client);
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
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $businessName,
        ?string $email = null,
        ?bool $managedAccountAllowCustomPricing = null,
        ?string $password = null,
        ?bool $rollupBilling = null,
        RequestOptions|array|null $requestOptions = null,
    ): ManagedAccountNewResponse {
        $params = Util::removeNulls(
            [
                'businessName' => $businessName,
                'email' => $email,
                'managedAccountAllowCustomPricing' => $managedAccountAllowCustomPricing,
                'password' => $password,
                'rollupBilling' => $rollupBilling,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieves the details of a single managed account.
     *
     * @param string $id Managed Account User ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): ManagedAccountGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Update a single managed account.
     *
     * @param string $id Managed Account User ID
     * @param bool $managedAccountAllowCustomPricing Boolean value that indicates if the managed account is able to have custom pricing set for it or not. If false, uses the pricing of the manager account. Defaults to false. This value may be changed, but there may be time lag between when the value is changed and pricing changes take effect.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $id,
        ?bool $managedAccountAllowCustomPricing = null,
        RequestOptions|array|null $requestOptions = null,
    ): ManagedAccountUpdateResponse {
        $params = Util::removeNulls(
            ['managedAccountAllowCustomPricing' => $managedAccountAllowCustomPricing]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Lists the accounts managed by the current user. Users need to be explictly approved by Telnyx in order to become manager accounts.
     *
     * @param Filter|FilterShape $filter Consolidated filter parameter (deepObject style). Originally: filter[email][contains], filter[email][eq], filter[organization_name][contains], filter[organization_name][eq]
     * @param bool $includeCancelledAccounts specifies if cancelled accounts should be included in the results
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
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<ManagedAccountListResponse>
     *
     * @throws APIException
     */
    public function list(
        Filter|array|null $filter = null,
        bool $includeCancelledAccounts = false,
        ?int $pageNumber = null,
        ?int $pageSize = null,
        Sort|string $sort = 'created_at',
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination {
        $params = Util::removeNulls(
            [
                'filter' => $filter,
                'includeCancelledAccounts' => $includeCancelledAccounts,
                'pageNumber' => $pageNumber,
                'pageSize' => $pageSize,
                'sort' => $sort,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Display information about allocatable global outbound channels for the current user. Only usable by account managers.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getAllocatableGlobalOutboundChannels(
        RequestOptions|array|null $requestOptions = null
    ): ManagedAccountGetAllocatableGlobalOutboundChannelsResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getAllocatableGlobalOutboundChannels(requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Update the amount of allocatable global outbound channels allocated to a specific managed account.
     *
     * @param string $id Managed Account User ID
     * @param int $channelLimit Integer value that indicates the number of allocatable global outbound channels that should be allocated to the managed account. Must be 0 or more. If the value is 0 then the account will have no usable channels and will not be able to perform outbound calling.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function updateGlobalChannelLimit(
        string $id,
        ?int $channelLimit = null,
        RequestOptions|array|null $requestOptions = null,
    ): ManagedAccountUpdateGlobalChannelLimitResponse {
        $params = Util::removeNulls(['channelLimit' => $channelLimit]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->updateGlobalChannelLimit($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
