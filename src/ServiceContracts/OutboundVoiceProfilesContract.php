<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\OutboundVoiceProfiles\OutboundCallRecording;
use Telnyx\OutboundVoiceProfiles\OutboundVoiceProfileDeleteResponse;
use Telnyx\OutboundVoiceProfiles\OutboundVoiceProfileGetResponse;
use Telnyx\OutboundVoiceProfiles\OutboundVoiceProfileListParams\Filter;
use Telnyx\OutboundVoiceProfiles\OutboundVoiceProfileListParams\Page;
use Telnyx\OutboundVoiceProfiles\OutboundVoiceProfileListParams\Sort;
use Telnyx\OutboundVoiceProfiles\OutboundVoiceProfileListResponse;
use Telnyx\OutboundVoiceProfiles\OutboundVoiceProfileNewResponse;
use Telnyx\OutboundVoiceProfiles\OutboundVoiceProfileUpdateResponse;
use Telnyx\OutboundVoiceProfiles\ServicePlan;
use Telnyx\OutboundVoiceProfiles\TrafficType;
use Telnyx\OutboundVoiceProfiles\UsagePaymentMethod;
use Telnyx\RequestOptions;

use const Telnyx\Core\OMIT as omit;

interface OutboundVoiceProfilesContract
{
    /**
     * @api
     *
     * @param string $name a user-supplied name to help with organization
     * @param string|null $billingGroupID The ID of the billing group associated with the outbound proflile. Defaults to null (for no group assigned).
     * @param OutboundCallRecording $callRecording
     * @param int|null $concurrentCallLimit Must be no more than your global concurrent call limit. Null means no limit.
     * @param string $dailySpendLimit the maximum amount of usage charges, in USD, you want Telnyx to allow on this outbound voice profile in a day before disallowing new calls
     * @param bool $dailySpendLimitEnabled specifies whether to enforce the daily_spend_limit on this outbound voice profile
     * @param bool $enabled Specifies whether the outbound voice profile can be used. Disabled profiles will result in outbound calls being blocked for the associated Connections.
     * @param float $maxDestinationRate maximum rate (price per minute) for a Destination to be allowed when making outbound calls
     * @param ServicePlan|value-of<ServicePlan> $servicePlan indicates the coverage of the termination regions
     * @param list<string> $tags
     * @param TrafficType|value-of<TrafficType> $trafficType specifies the type of traffic allowed in this profile
     * @param UsagePaymentMethod|value-of<UsagePaymentMethod> $usagePaymentMethod setting for how costs for outbound profile are calculated
     * @param list<string> $whitelistedDestinations the list of destinations you want to be able to call using this outbound voice profile formatted in alpha2
     */
    public function create(
        $name,
        $billingGroupID = omit,
        $callRecording = omit,
        $concurrentCallLimit = omit,
        $dailySpendLimit = omit,
        $dailySpendLimitEnabled = omit,
        $enabled = omit,
        $maxDestinationRate = omit,
        $servicePlan = omit,
        $tags = omit,
        $trafficType = omit,
        $usagePaymentMethod = omit,
        $whitelistedDestinations = omit,
        ?RequestOptions $requestOptions = null,
    ): OutboundVoiceProfileNewResponse;

    /**
     * @api
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): OutboundVoiceProfileGetResponse;

    /**
     * @api
     *
     * @param string $name a user-supplied name to help with organization
     * @param string|null $billingGroupID The ID of the billing group associated with the outbound proflile. Defaults to null (for no group assigned).
     * @param OutboundCallRecording $callRecording
     * @param int|null $concurrentCallLimit Must be no more than your global concurrent call limit. Null means no limit.
     * @param string $dailySpendLimit the maximum amount of usage charges, in USD, you want Telnyx to allow on this outbound voice profile in a day before disallowing new calls
     * @param bool $dailySpendLimitEnabled specifies whether to enforce the daily_spend_limit on this outbound voice profile
     * @param bool $enabled Specifies whether the outbound voice profile can be used. Disabled profiles will result in outbound calls being blocked for the associated Connections.
     * @param float $maxDestinationRate maximum rate (price per minute) for a Destination to be allowed when making outbound calls
     * @param ServicePlan|value-of<ServicePlan> $servicePlan indicates the coverage of the termination regions
     * @param list<string> $tags
     * @param TrafficType|value-of<TrafficType> $trafficType specifies the type of traffic allowed in this profile
     * @param UsagePaymentMethod|value-of<UsagePaymentMethod> $usagePaymentMethod setting for how costs for outbound profile are calculated
     * @param list<string> $whitelistedDestinations the list of destinations you want to be able to call using this outbound voice profile formatted in alpha2
     */
    public function update(
        string $id,
        $name,
        $billingGroupID = omit,
        $callRecording = omit,
        $concurrentCallLimit = omit,
        $dailySpendLimit = omit,
        $dailySpendLimitEnabled = omit,
        $enabled = omit,
        $maxDestinationRate = omit,
        $servicePlan = omit,
        $tags = omit,
        $trafficType = omit,
        $usagePaymentMethod = omit,
        $whitelistedDestinations = omit,
        ?RequestOptions $requestOptions = null,
    ): OutboundVoiceProfileUpdateResponse;

    /**
     * @api
     *
     * @param Filter $filter Consolidated filter parameter (deepObject style). Originally: filter[name][contains]
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[number], page[size]
     * @param Sort|value-of<Sort> $sort Specifies the sort order for results. By default sorting direction is ascending. To have the results sorted in descending order add the <code>-</code> prefix.<br/><br/>
     * That is: <ul>
     *   <li>
     *     <code>name</code>: sorts the result by the
     *     <code>name</code> field in ascending order.
     *   </li>
     *
     *   <li>
     *     <code>-name</code>: sorts the result by the
     *     <code>name</code> field in descending order.
     *   </li>
     * </ul> <br/>
     */
    public function list(
        $filter = omit,
        $page = omit,
        $sort = omit,
        ?RequestOptions $requestOptions = null,
    ): OutboundVoiceProfileListResponse;

    /**
     * @api
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): OutboundVoiceProfileDeleteResponse;
}
