<?php

declare(strict_types=1);

namespace Telnyx\OutboundVoiceProfiles;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\OutboundVoiceProfiles\OutboundVoiceProfileCreateParams\CallingWindow;

/**
 * Create an outbound voice profile.
 *
 * @see Telnyx\Services\OutboundVoiceProfilesService::create()
 *
 * @phpstan-import-type OutboundCallRecordingShape from \Telnyx\OutboundVoiceProfiles\OutboundCallRecording
 * @phpstan-import-type CallingWindowShape from \Telnyx\OutboundVoiceProfiles\OutboundVoiceProfileCreateParams\CallingWindow
 *
 * @phpstan-type OutboundVoiceProfileCreateParamsShape = array{
 *   name: string,
 *   billingGroupID?: string|null,
 *   callRecording?: null|OutboundCallRecording|OutboundCallRecordingShape,
 *   callingWindow?: null|CallingWindow|CallingWindowShape,
 *   concurrentCallLimit?: int|null,
 *   dailySpendLimit?: string|null,
 *   dailySpendLimitEnabled?: bool|null,
 *   enabled?: bool|null,
 *   maxDestinationRate?: float|null,
 *   servicePlan?: null|ServicePlan|value-of<ServicePlan>,
 *   tags?: list<string>|null,
 *   trafficType?: null|TrafficType|value-of<TrafficType>,
 *   usagePaymentMethod?: null|UsagePaymentMethod|value-of<UsagePaymentMethod>,
 *   whitelistedDestinations?: list<string>|null,
 * }
 */
final class OutboundVoiceProfileCreateParams implements BaseModel
{
    /** @use SdkModel<OutboundVoiceProfileCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * A user-supplied name to help with organization.
     */
    #[Required]
    public string $name;

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
     * `new OutboundVoiceProfileCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * OutboundVoiceProfileCreateParams::with(name: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new OutboundVoiceProfileCreateParams)->withName(...)
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
     * @param OutboundCallRecording|OutboundCallRecordingShape|null $callRecording
     * @param CallingWindow|CallingWindowShape|null $callingWindow
     * @param ServicePlan|value-of<ServicePlan>|null $servicePlan
     * @param list<string>|null $tags
     * @param TrafficType|value-of<TrafficType>|null $trafficType
     * @param UsagePaymentMethod|value-of<UsagePaymentMethod>|null $usagePaymentMethod
     * @param list<string>|null $whitelistedDestinations
     */
    public static function with(
        string $name,
        ?string $billingGroupID = null,
        OutboundCallRecording|array|null $callRecording = null,
        CallingWindow|array|null $callingWindow = null,
        ?int $concurrentCallLimit = null,
        ?string $dailySpendLimit = null,
        ?bool $dailySpendLimitEnabled = null,
        ?bool $enabled = null,
        ?float $maxDestinationRate = null,
        ServicePlan|string|null $servicePlan = null,
        ?array $tags = null,
        TrafficType|string|null $trafficType = null,
        UsagePaymentMethod|string|null $usagePaymentMethod = null,
        ?array $whitelistedDestinations = null,
    ): self {
        $self = new self;

        $self['name'] = $name;

        null !== $billingGroupID && $self['billingGroupID'] = $billingGroupID;
        null !== $callRecording && $self['callRecording'] = $callRecording;
        null !== $callingWindow && $self['callingWindow'] = $callingWindow;
        null !== $concurrentCallLimit && $self['concurrentCallLimit'] = $concurrentCallLimit;
        null !== $dailySpendLimit && $self['dailySpendLimit'] = $dailySpendLimit;
        null !== $dailySpendLimitEnabled && $self['dailySpendLimitEnabled'] = $dailySpendLimitEnabled;
        null !== $enabled && $self['enabled'] = $enabled;
        null !== $maxDestinationRate && $self['maxDestinationRate'] = $maxDestinationRate;
        null !== $servicePlan && $self['servicePlan'] = $servicePlan;
        null !== $tags && $self['tags'] = $tags;
        null !== $trafficType && $self['trafficType'] = $trafficType;
        null !== $usagePaymentMethod && $self['usagePaymentMethod'] = $usagePaymentMethod;
        null !== $whitelistedDestinations && $self['whitelistedDestinations'] = $whitelistedDestinations;

        return $self;
    }

    /**
     * A user-supplied name to help with organization.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * The ID of the billing group associated with the outbound proflile. Defaults to null (for no group assigned).
     */
    public function withBillingGroupID(?string $billingGroupID): self
    {
        $self = clone $this;
        $self['billingGroupID'] = $billingGroupID;

        return $self;
    }

    /**
     * @param OutboundCallRecording|OutboundCallRecordingShape $callRecording
     */
    public function withCallRecording(
        OutboundCallRecording|array $callRecording
    ): self {
        $self = clone $this;
        $self['callRecording'] = $callRecording;

        return $self;
    }

    /**
     * (BETA) Specifies the time window and call limits for calls made using this outbound voice profile. Note that all times are UTC in 24-hour clock time.
     *
     * @param CallingWindow|CallingWindowShape $callingWindow
     */
    public function withCallingWindow(CallingWindow|array $callingWindow): self
    {
        $self = clone $this;
        $self['callingWindow'] = $callingWindow;

        return $self;
    }

    /**
     * Must be no more than your global concurrent call limit. Null means no limit.
     */
    public function withConcurrentCallLimit(?int $concurrentCallLimit): self
    {
        $self = clone $this;
        $self['concurrentCallLimit'] = $concurrentCallLimit;

        return $self;
    }

    /**
     * The maximum amount of usage charges, in USD, you want Telnyx to allow on this outbound voice profile in a day before disallowing new calls.
     */
    public function withDailySpendLimit(string $dailySpendLimit): self
    {
        $self = clone $this;
        $self['dailySpendLimit'] = $dailySpendLimit;

        return $self;
    }

    /**
     * Specifies whether to enforce the daily_spend_limit on this outbound voice profile.
     */
    public function withDailySpendLimitEnabled(
        bool $dailySpendLimitEnabled
    ): self {
        $self = clone $this;
        $self['dailySpendLimitEnabled'] = $dailySpendLimitEnabled;

        return $self;
    }

    /**
     * Specifies whether the outbound voice profile can be used. Disabled profiles will result in outbound calls being blocked for the associated Connections.
     */
    public function withEnabled(bool $enabled): self
    {
        $self = clone $this;
        $self['enabled'] = $enabled;

        return $self;
    }

    /**
     * Maximum rate (price per minute) for a Destination to be allowed when making outbound calls.
     */
    public function withMaxDestinationRate(float $maxDestinationRate): self
    {
        $self = clone $this;
        $self['maxDestinationRate'] = $maxDestinationRate;

        return $self;
    }

    /**
     * Indicates the coverage of the termination regions.
     *
     * @param ServicePlan|value-of<ServicePlan> $servicePlan
     */
    public function withServicePlan(ServicePlan|string $servicePlan): self
    {
        $self = clone $this;
        $self['servicePlan'] = $servicePlan;

        return $self;
    }

    /**
     * @param list<string> $tags
     */
    public function withTags(array $tags): self
    {
        $self = clone $this;
        $self['tags'] = $tags;

        return $self;
    }

    /**
     * Specifies the type of traffic allowed in this profile.
     *
     * @param TrafficType|value-of<TrafficType> $trafficType
     */
    public function withTrafficType(TrafficType|string $trafficType): self
    {
        $self = clone $this;
        $self['trafficType'] = $trafficType;

        return $self;
    }

    /**
     * Setting for how costs for outbound profile are calculated.
     *
     * @param UsagePaymentMethod|value-of<UsagePaymentMethod> $usagePaymentMethod
     */
    public function withUsagePaymentMethod(
        UsagePaymentMethod|string $usagePaymentMethod
    ): self {
        $self = clone $this;
        $self['usagePaymentMethod'] = $usagePaymentMethod;

        return $self;
    }

    /**
     * The list of destinations you want to be able to call using this outbound voice profile formatted in alpha2.
     *
     * @param list<string> $whitelistedDestinations
     */
    public function withWhitelistedDestinations(
        array $whitelistedDestinations
    ): self {
        $self = clone $this;
        $self['whitelistedDestinations'] = $whitelistedDestinations;

        return $self;
    }
}
