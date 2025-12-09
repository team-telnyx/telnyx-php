<?php

declare(strict_types=1);

namespace Telnyx\OutboundVoiceProfiles;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\OutboundVoiceProfiles\OutboundCallRecording\CallRecordingChannels;
use Telnyx\OutboundVoiceProfiles\OutboundCallRecording\CallRecordingFormat;
use Telnyx\OutboundVoiceProfiles\OutboundCallRecording\CallRecordingType;
use Telnyx\OutboundVoiceProfiles\OutboundVoiceProfile\CallingWindow;

/**
 * @phpstan-type OutboundVoiceProfileShape = array{
 *   name: string,
 *   id?: string|null,
 *   billingGroupID?: string|null,
 *   callRecording?: OutboundCallRecording|null,
 *   callingWindow?: CallingWindow|null,
 *   concurrentCallLimit?: int|null,
 *   connectionsCount?: int|null,
 *   createdAt?: string|null,
 *   dailySpendLimit?: string|null,
 *   dailySpendLimitEnabled?: bool|null,
 *   enabled?: bool|null,
 *   maxDestinationRate?: float|null,
 *   recordType?: string|null,
 *   servicePlan?: value-of<ServicePlan>|null,
 *   tags?: list<string>|null,
 *   trafficType?: value-of<TrafficType>|null,
 *   updatedAt?: string|null,
 *   usagePaymentMethod?: value-of<UsagePaymentMethod>|null,
 *   whitelistedDestinations?: list<string>|null,
 * }
 */
final class OutboundVoiceProfile implements BaseModel
{
    /** @use SdkModel<OutboundVoiceProfileShape> */
    use SdkModel;

    /**
     * A user-supplied name to help with organization.
     */
    #[Required]
    public string $name;

    /**
     * Identifies the resource.
     */
    #[Optional]
    public ?string $id;

    /**
     * The ID of the billing group associated with the outbound proflile. Defaults to null (for no group assigned).
     */
    #[Optional('billing_group_id', nullable: true)]
    public ?string $billingGroupID;

    #[Optional('call_recording')]
    public ?OutboundCallRecording $callRecording;

    /**
     * (BETA) Specifies the time window and call limits for calls made using this outbound voice profile. Note that all times are UTC in 24-hour clock time.
     */
    #[Optional('calling_window')]
    public ?CallingWindow $callingWindow;

    /**
     * Must be no more than your global concurrent call limit. Null means no limit.
     */
    #[Optional('concurrent_call_limit', nullable: true)]
    public ?int $concurrentCallLimit;

    /**
     * Amount of connections associated with this outbound voice profile.
     */
    #[Optional('connections_count')]
    public ?int $connectionsCount;

    /**
     * ISO 8601 formatted date-time indicating when the resource was created.
     */
    #[Optional('created_at')]
    public ?string $createdAt;

    /**
     * The maximum amount of usage charges, in USD, you want Telnyx to allow on this outbound voice profile in a day before disallowing new calls.
     */
    #[Optional('daily_spend_limit')]
    public ?string $dailySpendLimit;

    /**
     * Specifies whether to enforce the daily_spend_limit on this outbound voice profile.
     */
    #[Optional('daily_spend_limit_enabled')]
    public ?bool $dailySpendLimitEnabled;

    /**
     * Specifies whether the outbound voice profile can be used. Disabled profiles will result in outbound calls being blocked for the associated Connections.
     */
    #[Optional]
    public ?bool $enabled;

    /**
     * Maximum rate (price per minute) for a Destination to be allowed when making outbound calls.
     */
    #[Optional('max_destination_rate')]
    public ?float $maxDestinationRate;

    /**
     * Identifies the type of the resource.
     */
    #[Optional('record_type')]
    public ?string $recordType;

    /**
     * Indicates the coverage of the termination regions.
     *
     * @var value-of<ServicePlan>|null $servicePlan
     */
    #[Optional('service_plan', enum: ServicePlan::class)]
    public ?string $servicePlan;

    /** @var list<string>|null $tags */
    #[Optional(list: 'string')]
    public ?array $tags;

    /**
     * Specifies the type of traffic allowed in this profile.
     *
     * @var value-of<TrafficType>|null $trafficType
     */
    #[Optional('traffic_type', enum: TrafficType::class)]
    public ?string $trafficType;

    /**
     * ISO 8601 formatted date-time indicating when the resource was updated.
     */
    #[Optional('updated_at')]
    public ?string $updatedAt;

    /**
     * Setting for how costs for outbound profile are calculated.
     *
     * @var value-of<UsagePaymentMethod>|null $usagePaymentMethod
     */
    #[Optional('usage_payment_method', enum: UsagePaymentMethod::class)]
    public ?string $usagePaymentMethod;

    /**
     * The list of destinations you want to be able to call using this outbound voice profile formatted in alpha2.
     *
     * @var list<string>|null $whitelistedDestinations
     */
    #[Optional('whitelisted_destinations', list: 'string')]
    public ?array $whitelistedDestinations;

    /**
     * `new OutboundVoiceProfile()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * OutboundVoiceProfile::with(name: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new OutboundVoiceProfile)->withName(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param OutboundCallRecording|array{
     *   callRecordingCallerPhoneNumbers?: list<string>|null,
     *   callRecordingChannels?: value-of<CallRecordingChannels>|null,
     *   callRecordingFormat?: value-of<CallRecordingFormat>|null,
     *   callRecordingType?: value-of<CallRecordingType>|null,
     * } $callRecording
     * @param CallingWindow|array{
     *   callsPerCld?: int|null, endTime?: string|null, startTime?: string|null
     * } $callingWindow
     * @param ServicePlan|value-of<ServicePlan> $servicePlan
     * @param list<string> $tags
     * @param TrafficType|value-of<TrafficType> $trafficType
     * @param UsagePaymentMethod|value-of<UsagePaymentMethod> $usagePaymentMethod
     * @param list<string> $whitelistedDestinations
     */
    public static function with(
        string $name,
        ?string $id = null,
        ?string $billingGroupID = null,
        OutboundCallRecording|array|null $callRecording = null,
        CallingWindow|array|null $callingWindow = null,
        ?int $concurrentCallLimit = null,
        ?int $connectionsCount = null,
        ?string $createdAt = null,
        ?string $dailySpendLimit = null,
        ?bool $dailySpendLimitEnabled = null,
        ?bool $enabled = null,
        ?float $maxDestinationRate = null,
        ?string $recordType = null,
        ServicePlan|string|null $servicePlan = null,
        ?array $tags = null,
        TrafficType|string|null $trafficType = null,
        ?string $updatedAt = null,
        UsagePaymentMethod|string|null $usagePaymentMethod = null,
        ?array $whitelistedDestinations = null,
    ): self {
        $obj = new self;

        $obj['name'] = $name;

        null !== $id && $obj['id'] = $id;
        null !== $billingGroupID && $obj['billingGroupID'] = $billingGroupID;
        null !== $callRecording && $obj['callRecording'] = $callRecording;
        null !== $callingWindow && $obj['callingWindow'] = $callingWindow;
        null !== $concurrentCallLimit && $obj['concurrentCallLimit'] = $concurrentCallLimit;
        null !== $connectionsCount && $obj['connectionsCount'] = $connectionsCount;
        null !== $createdAt && $obj['createdAt'] = $createdAt;
        null !== $dailySpendLimit && $obj['dailySpendLimit'] = $dailySpendLimit;
        null !== $dailySpendLimitEnabled && $obj['dailySpendLimitEnabled'] = $dailySpendLimitEnabled;
        null !== $enabled && $obj['enabled'] = $enabled;
        null !== $maxDestinationRate && $obj['maxDestinationRate'] = $maxDestinationRate;
        null !== $recordType && $obj['recordType'] = $recordType;
        null !== $servicePlan && $obj['servicePlan'] = $servicePlan;
        null !== $tags && $obj['tags'] = $tags;
        null !== $trafficType && $obj['trafficType'] = $trafficType;
        null !== $updatedAt && $obj['updatedAt'] = $updatedAt;
        null !== $usagePaymentMethod && $obj['usagePaymentMethod'] = $usagePaymentMethod;
        null !== $whitelistedDestinations && $obj['whitelistedDestinations'] = $whitelistedDestinations;

        return $obj;
    }

    /**
     * A user-supplied name to help with organization.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }

    /**
     * Identifies the resource.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * The ID of the billing group associated with the outbound proflile. Defaults to null (for no group assigned).
     */
    public function withBillingGroupID(?string $billingGroupID): self
    {
        $obj = clone $this;
        $obj['billingGroupID'] = $billingGroupID;

        return $obj;
    }

    /**
     * @param OutboundCallRecording|array{
     *   callRecordingCallerPhoneNumbers?: list<string>|null,
     *   callRecordingChannels?: value-of<CallRecordingChannels>|null,
     *   callRecordingFormat?: value-of<CallRecordingFormat>|null,
     *   callRecordingType?: value-of<CallRecordingType>|null,
     * } $callRecording
     */
    public function withCallRecording(
        OutboundCallRecording|array $callRecording
    ): self {
        $obj = clone $this;
        $obj['callRecording'] = $callRecording;

        return $obj;
    }

    /**
     * (BETA) Specifies the time window and call limits for calls made using this outbound voice profile. Note that all times are UTC in 24-hour clock time.
     *
     * @param CallingWindow|array{
     *   callsPerCld?: int|null, endTime?: string|null, startTime?: string|null
     * } $callingWindow
     */
    public function withCallingWindow(CallingWindow|array $callingWindow): self
    {
        $obj = clone $this;
        $obj['callingWindow'] = $callingWindow;

        return $obj;
    }

    /**
     * Must be no more than your global concurrent call limit. Null means no limit.
     */
    public function withConcurrentCallLimit(?int $concurrentCallLimit): self
    {
        $obj = clone $this;
        $obj['concurrentCallLimit'] = $concurrentCallLimit;

        return $obj;
    }

    /**
     * Amount of connections associated with this outbound voice profile.
     */
    public function withConnectionsCount(int $connectionsCount): self
    {
        $obj = clone $this;
        $obj['connectionsCount'] = $connectionsCount;

        return $obj;
    }

    /**
     * ISO 8601 formatted date-time indicating when the resource was created.
     */
    public function withCreatedAt(string $createdAt): self
    {
        $obj = clone $this;
        $obj['createdAt'] = $createdAt;

        return $obj;
    }

    /**
     * The maximum amount of usage charges, in USD, you want Telnyx to allow on this outbound voice profile in a day before disallowing new calls.
     */
    public function withDailySpendLimit(string $dailySpendLimit): self
    {
        $obj = clone $this;
        $obj['dailySpendLimit'] = $dailySpendLimit;

        return $obj;
    }

    /**
     * Specifies whether to enforce the daily_spend_limit on this outbound voice profile.
     */
    public function withDailySpendLimitEnabled(
        bool $dailySpendLimitEnabled
    ): self {
        $obj = clone $this;
        $obj['dailySpendLimitEnabled'] = $dailySpendLimitEnabled;

        return $obj;
    }

    /**
     * Specifies whether the outbound voice profile can be used. Disabled profiles will result in outbound calls being blocked for the associated Connections.
     */
    public function withEnabled(bool $enabled): self
    {
        $obj = clone $this;
        $obj['enabled'] = $enabled;

        return $obj;
    }

    /**
     * Maximum rate (price per minute) for a Destination to be allowed when making outbound calls.
     */
    public function withMaxDestinationRate(float $maxDestinationRate): self
    {
        $obj = clone $this;
        $obj['maxDestinationRate'] = $maxDestinationRate;

        return $obj;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj['recordType'] = $recordType;

        return $obj;
    }

    /**
     * Indicates the coverage of the termination regions.
     *
     * @param ServicePlan|value-of<ServicePlan> $servicePlan
     */
    public function withServicePlan(ServicePlan|string $servicePlan): self
    {
        $obj = clone $this;
        $obj['servicePlan'] = $servicePlan;

        return $obj;
    }

    /**
     * @param list<string> $tags
     */
    public function withTags(array $tags): self
    {
        $obj = clone $this;
        $obj['tags'] = $tags;

        return $obj;
    }

    /**
     * Specifies the type of traffic allowed in this profile.
     *
     * @param TrafficType|value-of<TrafficType> $trafficType
     */
    public function withTrafficType(TrafficType|string $trafficType): self
    {
        $obj = clone $this;
        $obj['trafficType'] = $trafficType;

        return $obj;
    }

    /**
     * ISO 8601 formatted date-time indicating when the resource was updated.
     */
    public function withUpdatedAt(string $updatedAt): self
    {
        $obj = clone $this;
        $obj['updatedAt'] = $updatedAt;

        return $obj;
    }

    /**
     * Setting for how costs for outbound profile are calculated.
     *
     * @param UsagePaymentMethod|value-of<UsagePaymentMethod> $usagePaymentMethod
     */
    public function withUsagePaymentMethod(
        UsagePaymentMethod|string $usagePaymentMethod
    ): self {
        $obj = clone $this;
        $obj['usagePaymentMethod'] = $usagePaymentMethod;

        return $obj;
    }

    /**
     * The list of destinations you want to be able to call using this outbound voice profile formatted in alpha2.
     *
     * @param list<string> $whitelistedDestinations
     */
    public function withWhitelistedDestinations(
        array $whitelistedDestinations
    ): self {
        $obj = clone $this;
        $obj['whitelistedDestinations'] = $whitelistedDestinations;

        return $obj;
    }
}
