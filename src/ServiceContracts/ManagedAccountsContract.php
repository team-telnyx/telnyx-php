<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\ManagedAccounts\ManagedAccountGetAllocatableGlobalOutboundChannelsResponse;
use Telnyx\ManagedAccounts\ManagedAccountGetResponse;
use Telnyx\ManagedAccounts\ManagedAccountListParams\Filter;
use Telnyx\ManagedAccounts\ManagedAccountListParams\Page;
use Telnyx\ManagedAccounts\ManagedAccountListParams\Sort;
use Telnyx\ManagedAccounts\ManagedAccountListResponse;
use Telnyx\ManagedAccounts\ManagedAccountNewResponse;
use Telnyx\ManagedAccounts\ManagedAccountUpdateGlobalChannelLimitResponse;
use Telnyx\ManagedAccounts\ManagedAccountUpdateResponse;
use Telnyx\RequestOptions;

use const Telnyx\Core\OMIT as omit;

interface ManagedAccountsContract
{
    /**
     * @api
     *
     * @param string $businessName the name of the business for which the new managed account is being created, that will be used as the managed accounts's organization's name
     * @param string $email The email address for the managed account. If not provided, the email address will be generated based on the email address of the manager account.
     * @param bool $managedAccountAllowCustomPricing Boolean value that indicates if the managed account is able to have custom pricing set for it or not. If false, uses the pricing of the manager account. Defaults to false. This value may be changed after creation, but there may be time lag between when the value is changed and pricing changes take effect.
     * @param string $password Password for the managed account. If a password is not supplied, the account will not be able to be signed into directly. (A password reset may still be performed later to enable sign-in via password.)
     * @param bool $rollupBilling Boolean value that indicates if the billing information and charges to the managed account "roll up" to the manager account. If true, the managed account will not have its own balance and will use the shared balance with the manager account. This value cannot be changed after account creation without going through Telnyx support as changes require manual updates to the account ledger. Defaults to false.
     *
     * @return ManagedAccountNewResponse<HasRawResponse>
     */
    public function create(
        $businessName,
        $email = omit,
        $managedAccountAllowCustomPricing = omit,
        $password = omit,
        $rollupBilling = omit,
        ?RequestOptions $requestOptions = null,
    ): ManagedAccountNewResponse;

    /**
     * @api
     *
     * @return ManagedAccountGetResponse<HasRawResponse>
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): ManagedAccountGetResponse;

    /**
     * @api
     *
     * @param bool $managedAccountAllowCustomPricing Boolean value that indicates if the managed account is able to have custom pricing set for it or not. If false, uses the pricing of the manager account. Defaults to false. This value may be changed, but there may be time lag between when the value is changed and pricing changes take effect.
     *
     * @return ManagedAccountUpdateResponse<HasRawResponse>
     */
    public function update(
        string $id,
        $managedAccountAllowCustomPricing = omit,
        ?RequestOptions $requestOptions = null,
    ): ManagedAccountUpdateResponse;

    /**
     * @api
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
     * @return ManagedAccountListResponse<HasRawResponse>
     */
    public function list(
        $filter = omit,
        $includeCancelledAccounts = omit,
        $page = omit,
        $sort = omit,
        ?RequestOptions $requestOptions = null,
    ): ManagedAccountListResponse;

    /**
     * @api
     *
     * @return ManagedAccountGetAllocatableGlobalOutboundChannelsResponse<
     *   HasRawResponse
     * >
     */
    public function getAllocatableGlobalOutboundChannels(
        ?RequestOptions $requestOptions = null
    ): ManagedAccountGetAllocatableGlobalOutboundChannelsResponse;

    /**
     * @api
     *
     * @param int $channelLimit Integer value that indicates the number of allocatable global outbound channels that should be allocated to the managed account. Must be 0 or more. If the value is 0 then the account will have no usable channels and will not be able to perform outbound calling.
     *
     * @return ManagedAccountUpdateGlobalChannelLimitResponse<HasRawResponse>
     */
    public function updateGlobalChannelLimit(
        string $id,
        $channelLimit = omit,
        ?RequestOptions $requestOptions = null
    ): ManagedAccountUpdateGlobalChannelLimitResponse;
}
