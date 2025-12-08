<?php

declare(strict_types=1);

namespace Telnyx\OutboundVoiceProfiles;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\OutboundVoiceProfiles\OutboundCallRecording\CallRecordingChannels;
use Telnyx\OutboundVoiceProfiles\OutboundCallRecording\CallRecordingFormat;
use Telnyx\OutboundVoiceProfiles\OutboundCallRecording\CallRecordingType;
use Telnyx\OutboundVoiceProfiles\OutboundVoiceProfileCreateParams\CallingWindow;

/**
 * Create an outbound voice profile.
 *
 * @see Telnyx\Services\OutboundVoiceProfilesService::create()
 *
 * @phpstan-type OutboundVoiceProfileCreateParamsShape = array{
 *   name: string,
 *   billing_group_id?: string|null,
 *   call_recording?: OutboundCallRecording|array{
 *     call_recording_caller_phone_numbers?: list<string>|null,
 *     call_recording_channels?: value-of<CallRecordingChannels>|null,
 *     call_recording_format?: value-of<CallRecordingFormat>|null,
 *     call_recording_type?: value-of<CallRecordingType>|null,
 *   },
 *   calling_window?: CallingWindow|array{
 *     calls_per_cld?: int|null, end_time?: string|null, start_time?: string|null
 *   },
 *   concurrent_call_limit?: int|null,
 *   daily_spend_limit?: string,
 *   daily_spend_limit_enabled?: bool,
 *   enabled?: bool,
 *   max_destination_rate?: float,
 *   service_plan?: ServicePlan|value-of<ServicePlan>,
 *   tags?: list<string>,
 *   traffic_type?: TrafficType|value-of<TrafficType>,
 *   usage_payment_method?: UsagePaymentMethod|value-of<UsagePaymentMethod>,
 *   whitelisted_destinations?: list<string>,
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
    #[Optional(nullable: true)]
    public ?string $billing_group_id;

    #[Optional]
    public ?OutboundCallRecording $call_recording;

    /**
     * (BETA) Specifies the time window and call limits for calls made using this outbound voice profile. Note that all times are UTC in 24-hour clock time.
     */
    #[Optional]
    public ?CallingWindow $calling_window;

    /**
     * Must be no more than your global concurrent call limit. Null means no limit.
     */
    #[Optional(nullable: true)]
    public ?int $concurrent_call_limit;

    /**
     * The maximum amount of usage charges, in USD, you want Telnyx to allow on this outbound voice profile in a day before disallowing new calls.
     */
    #[Optional]
    public ?string $daily_spend_limit;

    /**
     * Specifies whether to enforce the daily_spend_limit on this outbound voice profile.
     */
    #[Optional]
    public ?bool $daily_spend_limit_enabled;

    /**
     * Specifies whether the outbound voice profile can be used. Disabled profiles will result in outbound calls being blocked for the associated Connections.
     */
    #[Optional]
    public ?bool $enabled;

    /**
     * Maximum rate (price per minute) for a Destination to be allowed when making outbound calls.
     */
    #[Optional]
    public ?float $max_destination_rate;

    /**
     * Indicates the coverage of the termination regions.
     *
     * @var value-of<ServicePlan>|null $service_plan
     */
    #[Optional(enum: ServicePlan::class)]
    public ?string $service_plan;

    /** @var list<string>|null $tags */
    #[Optional(list: 'string')]
    public ?array $tags;

    /**
     * Specifies the type of traffic allowed in this profile.
     *
     * @var value-of<TrafficType>|null $traffic_type
     */
    #[Optional(enum: TrafficType::class)]
    public ?string $traffic_type;

    /**
     * Setting for how costs for outbound profile are calculated.
     *
     * @var value-of<UsagePaymentMethod>|null $usage_payment_method
     */
    #[Optional(enum: UsagePaymentMethod::class)]
    public ?string $usage_payment_method;

    /**
     * The list of destinations you want to be able to call using this outbound voice profile formatted in alpha2.
     *
     * @var list<string>|null $whitelisted_destinations
     */
    #[Optional(list: 'string')]
    public ?array $whitelisted_destinations;

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
     * @param OutboundCallRecording|array{
     *   call_recording_caller_phone_numbers?: list<string>|null,
     *   call_recording_channels?: value-of<CallRecordingChannels>|null,
     *   call_recording_format?: value-of<CallRecordingFormat>|null,
     *   call_recording_type?: value-of<CallRecordingType>|null,
     * } $call_recording
     * @param CallingWindow|array{
     *   calls_per_cld?: int|null, end_time?: string|null, start_time?: string|null
     * } $calling_window
     * @param ServicePlan|value-of<ServicePlan> $service_plan
     * @param list<string> $tags
     * @param TrafficType|value-of<TrafficType> $traffic_type
     * @param UsagePaymentMethod|value-of<UsagePaymentMethod> $usage_payment_method
     * @param list<string> $whitelisted_destinations
     */
    public static function with(
        string $name,
        ?string $billing_group_id = null,
        OutboundCallRecording|array|null $call_recording = null,
        CallingWindow|array|null $calling_window = null,
        ?int $concurrent_call_limit = null,
        ?string $daily_spend_limit = null,
        ?bool $daily_spend_limit_enabled = null,
        ?bool $enabled = null,
        ?float $max_destination_rate = null,
        ServicePlan|string|null $service_plan = null,
        ?array $tags = null,
        TrafficType|string|null $traffic_type = null,
        UsagePaymentMethod|string|null $usage_payment_method = null,
        ?array $whitelisted_destinations = null,
    ): self {
        $obj = new self;

        $obj['name'] = $name;

        null !== $billing_group_id && $obj['billing_group_id'] = $billing_group_id;
        null !== $call_recording && $obj['call_recording'] = $call_recording;
        null !== $calling_window && $obj['calling_window'] = $calling_window;
        null !== $concurrent_call_limit && $obj['concurrent_call_limit'] = $concurrent_call_limit;
        null !== $daily_spend_limit && $obj['daily_spend_limit'] = $daily_spend_limit;
        null !== $daily_spend_limit_enabled && $obj['daily_spend_limit_enabled'] = $daily_spend_limit_enabled;
        null !== $enabled && $obj['enabled'] = $enabled;
        null !== $max_destination_rate && $obj['max_destination_rate'] = $max_destination_rate;
        null !== $service_plan && $obj['service_plan'] = $service_plan;
        null !== $tags && $obj['tags'] = $tags;
        null !== $traffic_type && $obj['traffic_type'] = $traffic_type;
        null !== $usage_payment_method && $obj['usage_payment_method'] = $usage_payment_method;
        null !== $whitelisted_destinations && $obj['whitelisted_destinations'] = $whitelisted_destinations;

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
     * The ID of the billing group associated with the outbound proflile. Defaults to null (for no group assigned).
     */
    public function withBillingGroupID(?string $billingGroupID): self
    {
        $obj = clone $this;
        $obj['billing_group_id'] = $billingGroupID;

        return $obj;
    }

    /**
     * @param OutboundCallRecording|array{
     *   call_recording_caller_phone_numbers?: list<string>|null,
     *   call_recording_channels?: value-of<CallRecordingChannels>|null,
     *   call_recording_format?: value-of<CallRecordingFormat>|null,
     *   call_recording_type?: value-of<CallRecordingType>|null,
     * } $callRecording
     */
    public function withCallRecording(
        OutboundCallRecording|array $callRecording
    ): self {
        $obj = clone $this;
        $obj['call_recording'] = $callRecording;

        return $obj;
    }

    /**
     * (BETA) Specifies the time window and call limits for calls made using this outbound voice profile. Note that all times are UTC in 24-hour clock time.
     *
     * @param CallingWindow|array{
     *   calls_per_cld?: int|null, end_time?: string|null, start_time?: string|null
     * } $callingWindow
     */
    public function withCallingWindow(CallingWindow|array $callingWindow): self
    {
        $obj = clone $this;
        $obj['calling_window'] = $callingWindow;

        return $obj;
    }

    /**
     * Must be no more than your global concurrent call limit. Null means no limit.
     */
    public function withConcurrentCallLimit(?int $concurrentCallLimit): self
    {
        $obj = clone $this;
        $obj['concurrent_call_limit'] = $concurrentCallLimit;

        return $obj;
    }

    /**
     * The maximum amount of usage charges, in USD, you want Telnyx to allow on this outbound voice profile in a day before disallowing new calls.
     */
    public function withDailySpendLimit(string $dailySpendLimit): self
    {
        $obj = clone $this;
        $obj['daily_spend_limit'] = $dailySpendLimit;

        return $obj;
    }

    /**
     * Specifies whether to enforce the daily_spend_limit on this outbound voice profile.
     */
    public function withDailySpendLimitEnabled(
        bool $dailySpendLimitEnabled
    ): self {
        $obj = clone $this;
        $obj['daily_spend_limit_enabled'] = $dailySpendLimitEnabled;

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
        $obj['max_destination_rate'] = $maxDestinationRate;

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
        $obj['service_plan'] = $servicePlan;

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
        $obj['traffic_type'] = $trafficType;

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
        $obj['usage_payment_method'] = $usagePaymentMethod;

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
        $obj['whitelisted_destinations'] = $whitelistedDestinations;

        return $obj;
    }
}
