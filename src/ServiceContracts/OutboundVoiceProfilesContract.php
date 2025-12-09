<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\OutboundVoiceProfiles\OutboundCallRecording;
use Telnyx\OutboundVoiceProfiles\OutboundCallRecording\CallRecordingChannels;
use Telnyx\OutboundVoiceProfiles\OutboundCallRecording\CallRecordingFormat;
use Telnyx\OutboundVoiceProfiles\OutboundCallRecording\CallRecordingType;
use Telnyx\OutboundVoiceProfiles\OutboundVoiceProfileDeleteResponse;
use Telnyx\OutboundVoiceProfiles\OutboundVoiceProfileGetResponse;
use Telnyx\OutboundVoiceProfiles\OutboundVoiceProfileListParams\Sort;
use Telnyx\OutboundVoiceProfiles\OutboundVoiceProfileListResponse;
use Telnyx\OutboundVoiceProfiles\OutboundVoiceProfileNewResponse;
use Telnyx\OutboundVoiceProfiles\OutboundVoiceProfileUpdateResponse;
use Telnyx\OutboundVoiceProfiles\ServicePlan;
use Telnyx\OutboundVoiceProfiles\TrafficType;
use Telnyx\OutboundVoiceProfiles\UsagePaymentMethod;
use Telnyx\RequestOptions;

interface OutboundVoiceProfilesContract
{
    /**
     * @api
     *
     * @param string $name a user-supplied name to help with organization
     * @param string|null $billingGroupID The ID of the billing group associated with the outbound proflile. Defaults to null (for no group assigned).
     * @param array{
     *   callRecordingCallerPhoneNumbers?: list<string>,
     *   callRecordingChannels?: 'single'|'dual'|CallRecordingChannels,
     *   callRecordingFormat?: 'wav'|'mp3'|CallRecordingFormat,
     *   callRecordingType?: 'all'|'none'|'by_caller_phone_number'|CallRecordingType,
     * }|OutboundCallRecording $callRecording
     * @param array{
     *   callsPerCld?: int, endTime?: string, startTime?: string
     * } $callingWindow (BETA) Specifies the time window and call limits for calls made using this outbound voice profile. Note that all times are UTC in 24-hour clock time.
     * @param int|null $concurrentCallLimit Must be no more than your global concurrent call limit. Null means no limit.
     * @param string $dailySpendLimit the maximum amount of usage charges, in USD, you want Telnyx to allow on this outbound voice profile in a day before disallowing new calls
     * @param bool $dailySpendLimitEnabled specifies whether to enforce the daily_spend_limit on this outbound voice profile
     * @param bool $enabled Specifies whether the outbound voice profile can be used. Disabled profiles will result in outbound calls being blocked for the associated Connections.
     * @param float $maxDestinationRate maximum rate (price per minute) for a Destination to be allowed when making outbound calls
     * @param 'global'|ServicePlan $servicePlan indicates the coverage of the termination regions
     * @param list<string> $tags
     * @param 'conversational'|TrafficType $trafficType specifies the type of traffic allowed in this profile
     * @param 'rate-deck'|UsagePaymentMethod $usagePaymentMethod setting for how costs for outbound profile are calculated
     * @param list<string> $whitelistedDestinations the list of destinations you want to be able to call using this outbound voice profile formatted in alpha2
     *
     * @throws APIException
     */
    public function create(
        string $name,
        ?string $billingGroupID = null,
        array|OutboundCallRecording|null $callRecording = null,
        ?array $callingWindow = null,
        ?int $concurrentCallLimit = null,
        ?string $dailySpendLimit = null,
        bool $dailySpendLimitEnabled = false,
        bool $enabled = true,
        ?float $maxDestinationRate = null,
        string|ServicePlan $servicePlan = 'global',
        ?array $tags = null,
        string|TrafficType $trafficType = 'conversational',
        string|UsagePaymentMethod $usagePaymentMethod = 'rate-deck',
        array $whitelistedDestinations = ['US', 'CA'],
        ?RequestOptions $requestOptions = null,
    ): OutboundVoiceProfileNewResponse;

    /**
     * @api
     *
     * @param string $id identifies the resource
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): OutboundVoiceProfileGetResponse;

    /**
     * @api
     *
     * @param string $id identifies the resource
     * @param string $name a user-supplied name to help with organization
     * @param string|null $billingGroupID The ID of the billing group associated with the outbound proflile. Defaults to null (for no group assigned).
     * @param array{
     *   callRecordingCallerPhoneNumbers?: list<string>,
     *   callRecordingChannels?: 'single'|'dual'|CallRecordingChannels,
     *   callRecordingFormat?: 'wav'|'mp3'|CallRecordingFormat,
     *   callRecordingType?: 'all'|'none'|'by_caller_phone_number'|CallRecordingType,
     * }|OutboundCallRecording $callRecording
     * @param array{
     *   callsPerCld?: int, endTime?: string, startTime?: string
     * } $callingWindow (BETA) Specifies the time window and call limits for calls made using this outbound voice profile
     * @param int|null $concurrentCallLimit Must be no more than your global concurrent call limit. Null means no limit.
     * @param string $dailySpendLimit the maximum amount of usage charges, in USD, you want Telnyx to allow on this outbound voice profile in a day before disallowing new calls
     * @param bool $dailySpendLimitEnabled specifies whether to enforce the daily_spend_limit on this outbound voice profile
     * @param bool $enabled Specifies whether the outbound voice profile can be used. Disabled profiles will result in outbound calls being blocked for the associated Connections.
     * @param float $maxDestinationRate maximum rate (price per minute) for a Destination to be allowed when making outbound calls
     * @param 'global'|ServicePlan $servicePlan indicates the coverage of the termination regions
     * @param list<string> $tags
     * @param 'conversational'|TrafficType $trafficType specifies the type of traffic allowed in this profile
     * @param 'rate-deck'|UsagePaymentMethod $usagePaymentMethod setting for how costs for outbound profile are calculated
     * @param list<string> $whitelistedDestinations the list of destinations you want to be able to call using this outbound voice profile formatted in alpha2
     *
     * @throws APIException
     */
    public function update(
        string $id,
        string $name,
        ?string $billingGroupID = null,
        array|OutboundCallRecording|null $callRecording = null,
        ?array $callingWindow = null,
        ?int $concurrentCallLimit = null,
        ?string $dailySpendLimit = null,
        bool $dailySpendLimitEnabled = false,
        bool $enabled = true,
        ?float $maxDestinationRate = null,
        string|ServicePlan $servicePlan = 'global',
        ?array $tags = null,
        string|TrafficType $trafficType = 'conversational',
        string|UsagePaymentMethod $usagePaymentMethod = 'rate-deck',
        array $whitelistedDestinations = ['US', 'CA'],
        ?RequestOptions $requestOptions = null,
    ): OutboundVoiceProfileUpdateResponse;

    /**
     * @api
     *
     * @param array{
     *   name?: array{contains?: string}
     * } $filter Consolidated filter parameter (deepObject style). Originally: filter[name][contains]
     * @param array{
     *   number?: int, size?: int
     * } $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     * @param 'enabled'|'-enabled'|'created_at'|'-created_at'|'name'|'-name'|'service_plan'|'-service_plan'|'traffic_type'|'-traffic_type'|'usage_payment_method'|'-usage_payment_method'|Sort $sort Specifies the sort order for results. By default sorting direction is ascending. To have the results sorted in descending order add the <code>-</code> prefix.<br/><br/>
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
     *
     * @throws APIException
     */
    public function list(
        ?array $filter = null,
        ?array $page = null,
        string|Sort $sort = '-created_at',
        ?RequestOptions $requestOptions = null,
    ): OutboundVoiceProfileListResponse;

    /**
     * @api
     *
     * @param string $id identifies the resource
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): OutboundVoiceProfileDeleteResponse;
}
