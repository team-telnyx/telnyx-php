<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\OutboundVoiceProfiles\OutboundCallRecording;
use Telnyx\OutboundVoiceProfiles\OutboundVoiceProfile;
use Telnyx\OutboundVoiceProfiles\OutboundVoiceProfileCreateParams\CallingWindow;
use Telnyx\OutboundVoiceProfiles\OutboundVoiceProfileDeleteResponse;
use Telnyx\OutboundVoiceProfiles\OutboundVoiceProfileGetResponse;
use Telnyx\OutboundVoiceProfiles\OutboundVoiceProfileListParams\Filter;
use Telnyx\OutboundVoiceProfiles\OutboundVoiceProfileListParams\Page;
use Telnyx\OutboundVoiceProfiles\OutboundVoiceProfileListParams\Sort;
use Telnyx\OutboundVoiceProfiles\OutboundVoiceProfileNewResponse;
use Telnyx\OutboundVoiceProfiles\OutboundVoiceProfileUpdateResponse;
use Telnyx\OutboundVoiceProfiles\ServicePlan;
use Telnyx\OutboundVoiceProfiles\TrafficType;
use Telnyx\OutboundVoiceProfiles\UsagePaymentMethod;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type CallingWindowShape from \Telnyx\OutboundVoiceProfiles\OutboundVoiceProfileCreateParams\CallingWindow
 * @phpstan-import-type CallingWindowShape from \Telnyx\OutboundVoiceProfiles\OutboundVoiceProfileUpdateParams\CallingWindow as CallingWindowShape1
 * @phpstan-import-type FilterShape from \Telnyx\OutboundVoiceProfiles\OutboundVoiceProfileListParams\Filter
 * @phpstan-import-type PageShape from \Telnyx\OutboundVoiceProfiles\OutboundVoiceProfileListParams\Page
 * @phpstan-import-type OutboundCallRecordingShape from \Telnyx\OutboundVoiceProfiles\OutboundCallRecording
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface OutboundVoiceProfilesContract
{
    /**
     * @api
     *
     * @param string $name a user-supplied name to help with organization
     * @param string|null $billingGroupID The ID of the billing group associated with the outbound proflile. Defaults to null (for no group assigned).
     * @param OutboundCallRecording|OutboundCallRecordingShape $callRecording
     * @param CallingWindow|CallingWindowShape $callingWindow (BETA) Specifies the time window and call limits for calls made using this outbound voice profile. Note that all times are UTC in 24-hour clock time.
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
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $name,
        ?string $billingGroupID = null,
        OutboundCallRecording|array|null $callRecording = null,
        CallingWindow|array|null $callingWindow = null,
        ?int $concurrentCallLimit = null,
        ?string $dailySpendLimit = null,
        bool $dailySpendLimitEnabled = false,
        bool $enabled = true,
        ?float $maxDestinationRate = null,
        ServicePlan|string $servicePlan = 'global',
        ?array $tags = null,
        TrafficType|string $trafficType = 'conversational',
        UsagePaymentMethod|string $usagePaymentMethod = 'rate-deck',
        array $whitelistedDestinations = ['US', 'CA'],
        RequestOptions|array|null $requestOptions = null,
    ): OutboundVoiceProfileNewResponse;

    /**
     * @api
     *
     * @param string $id identifies the resource
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): OutboundVoiceProfileGetResponse;

    /**
     * @api
     *
     * @param string $id identifies the resource
     * @param string $name a user-supplied name to help with organization
     * @param string|null $billingGroupID The ID of the billing group associated with the outbound proflile. Defaults to null (for no group assigned).
     * @param OutboundCallRecording|OutboundCallRecordingShape $callRecording
     * @param \Telnyx\OutboundVoiceProfiles\OutboundVoiceProfileUpdateParams\CallingWindow|CallingWindowShape1 $callingWindow (BETA) Specifies the time window and call limits for calls made using this outbound voice profile
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
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $id,
        string $name,
        ?string $billingGroupID = null,
        OutboundCallRecording|array|null $callRecording = null,
        \Telnyx\OutboundVoiceProfiles\OutboundVoiceProfileUpdateParams\CallingWindow|array|null $callingWindow = null,
        ?int $concurrentCallLimit = null,
        ?string $dailySpendLimit = null,
        bool $dailySpendLimitEnabled = false,
        bool $enabled = true,
        ?float $maxDestinationRate = null,
        ServicePlan|string $servicePlan = 'global',
        ?array $tags = null,
        TrafficType|string $trafficType = 'conversational',
        UsagePaymentMethod|string $usagePaymentMethod = 'rate-deck',
        array $whitelistedDestinations = ['US', 'CA'],
        RequestOptions|array|null $requestOptions = null,
    ): OutboundVoiceProfileUpdateResponse;

    /**
     * @api
     *
     * @param Filter|FilterShape $filter Consolidated filter parameter (deepObject style). Originally: filter[name][contains]
     * @param Page|PageShape $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
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
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultPagination<OutboundVoiceProfile>
     *
     * @throws APIException
     */
    public function list(
        Filter|array|null $filter = null,
        Page|array|null $page = null,
        Sort|string $sort = '-created_at',
        RequestOptions|array|null $requestOptions = null,
    ): DefaultPagination;

    /**
     * @api
     *
     * @param string $id identifies the resource
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): OutboundVoiceProfileDeleteResponse;
}
