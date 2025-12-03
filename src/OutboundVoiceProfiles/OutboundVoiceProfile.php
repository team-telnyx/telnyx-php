<?php

declare(strict_types=1);

namespace Telnyx\OutboundVoiceProfiles;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\OutboundVoiceProfiles\OutboundVoiceProfile\CallingWindow;

/**
 * @phpstan-type OutboundVoiceProfileShape = array{
 *   name: string,
 *   id?: string|null,
 *   billing_group_id?: string|null,
 *   call_recording?: OutboundCallRecording|null,
 *   calling_window?: CallingWindow|null,
 *   concurrent_call_limit?: int|null,
 *   connections_count?: int|null,
 *   created_at?: string|null,
 *   daily_spend_limit?: string|null,
 *   daily_spend_limit_enabled?: bool|null,
 *   enabled?: bool|null,
 *   max_destination_rate?: float|null,
 *   record_type?: string|null,
 *   service_plan?: value-of<ServicePlan>|null,
 *   tags?: list<string>|null,
 *   traffic_type?: value-of<TrafficType>|null,
 *   updated_at?: string|null,
 *   usage_payment_method?: value-of<UsagePaymentMethod>|null,
 *   whitelisted_destinations?: list<string>|null,
 * }
 */
final class OutboundVoiceProfile implements BaseModel
{
    /** @use SdkModel<OutboundVoiceProfileShape> */
    use SdkModel;

    /**
     * A user-supplied name to help with organization.
     */
    #[Api]
    public string $name;

    /**
     * Identifies the resource.
     */
    #[Api(optional: true)]
    public ?string $id;

    /**
     * The ID of the billing group associated with the outbound proflile. Defaults to null (for no group assigned).
     */
    #[Api(nullable: true, optional: true)]
    public ?string $billing_group_id;

    #[Api(optional: true)]
    public ?OutboundCallRecording $call_recording;

    /**
     * (BETA) Specifies the time window and call limits for calls made using this outbound voice profile. Note that all times are UTC in 24-hour clock time.
     */
    #[Api(optional: true)]
    public ?CallingWindow $calling_window;

    /**
     * Must be no more than your global concurrent call limit. Null means no limit.
     */
    #[Api(nullable: true, optional: true)]
    public ?int $concurrent_call_limit;

    /**
     * Amount of connections associated with this outbound voice profile.
     */
    #[Api(optional: true)]
    public ?int $connections_count;

    /**
     * ISO 8601 formatted date-time indicating when the resource was created.
     */
    #[Api(optional: true)]
    public ?string $created_at;

    /**
     * The maximum amount of usage charges, in USD, you want Telnyx to allow on this outbound voice profile in a day before disallowing new calls.
     */
    #[Api(optional: true)]
    public ?string $daily_spend_limit;

    /**
     * Specifies whether to enforce the daily_spend_limit on this outbound voice profile.
     */
    #[Api(optional: true)]
    public ?bool $daily_spend_limit_enabled;

    /**
     * Specifies whether the outbound voice profile can be used. Disabled profiles will result in outbound calls being blocked for the associated Connections.
     */
    #[Api(optional: true)]
    public ?bool $enabled;

    /**
     * Maximum rate (price per minute) for a Destination to be allowed when making outbound calls.
     */
    #[Api(optional: true)]
    public ?float $max_destination_rate;

    /**
     * Identifies the type of the resource.
     */
    #[Api(optional: true)]
    public ?string $record_type;

    /**
     * Indicates the coverage of the termination regions.
     *
     * @var value-of<ServicePlan>|null $service_plan
     */
    #[Api(enum: ServicePlan::class, optional: true)]
    public ?string $service_plan;

    /** @var list<string>|null $tags */
    #[Api(list: 'string', optional: true)]
    public ?array $tags;

    /**
     * Specifies the type of traffic allowed in this profile.
     *
     * @var value-of<TrafficType>|null $traffic_type
     */
    #[Api(enum: TrafficType::class, optional: true)]
    public ?string $traffic_type;

    /**
     * ISO 8601 formatted date-time indicating when the resource was updated.
     */
    #[Api(optional: true)]
    public ?string $updated_at;

    /**
     * Setting for how costs for outbound profile are calculated.
     *
     * @var value-of<UsagePaymentMethod>|null $usage_payment_method
     */
    #[Api(enum: UsagePaymentMethod::class, optional: true)]
    public ?string $usage_payment_method;

    /**
     * The list of destinations you want to be able to call using this outbound voice profile formatted in alpha2.
     *
     * @var list<string>|null $whitelisted_destinations
     */
    #[Api(list: 'string', optional: true)]
    public ?array $whitelisted_destinations;

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
     * @param ServicePlan|value-of<ServicePlan> $service_plan
     * @param list<string> $tags
     * @param TrafficType|value-of<TrafficType> $traffic_type
     * @param UsagePaymentMethod|value-of<UsagePaymentMethod> $usage_payment_method
     * @param list<string> $whitelisted_destinations
     */
    public static function with(
        string $name,
        ?string $id = null,
        ?string $billing_group_id = null,
        ?OutboundCallRecording $call_recording = null,
        ?CallingWindow $calling_window = null,
        ?int $concurrent_call_limit = null,
        ?int $connections_count = null,
        ?string $created_at = null,
        ?string $daily_spend_limit = null,
        ?bool $daily_spend_limit_enabled = null,
        ?bool $enabled = null,
        ?float $max_destination_rate = null,
        ?string $record_type = null,
        ServicePlan|string|null $service_plan = null,
        ?array $tags = null,
        TrafficType|string|null $traffic_type = null,
        ?string $updated_at = null,
        UsagePaymentMethod|string|null $usage_payment_method = null,
        ?array $whitelisted_destinations = null,
    ): self {
        $obj = new self;

        $obj->name = $name;

        null !== $id && $obj->id = $id;
        null !== $billing_group_id && $obj->billing_group_id = $billing_group_id;
        null !== $call_recording && $obj->call_recording = $call_recording;
        null !== $calling_window && $obj->calling_window = $calling_window;
        null !== $concurrent_call_limit && $obj->concurrent_call_limit = $concurrent_call_limit;
        null !== $connections_count && $obj->connections_count = $connections_count;
        null !== $created_at && $obj->created_at = $created_at;
        null !== $daily_spend_limit && $obj->daily_spend_limit = $daily_spend_limit;
        null !== $daily_spend_limit_enabled && $obj->daily_spend_limit_enabled = $daily_spend_limit_enabled;
        null !== $enabled && $obj->enabled = $enabled;
        null !== $max_destination_rate && $obj->max_destination_rate = $max_destination_rate;
        null !== $record_type && $obj->record_type = $record_type;
        null !== $service_plan && $obj['service_plan'] = $service_plan;
        null !== $tags && $obj->tags = $tags;
        null !== $traffic_type && $obj['traffic_type'] = $traffic_type;
        null !== $updated_at && $obj->updated_at = $updated_at;
        null !== $usage_payment_method && $obj['usage_payment_method'] = $usage_payment_method;
        null !== $whitelisted_destinations && $obj->whitelisted_destinations = $whitelisted_destinations;

        return $obj;
    }

    /**
     * A user-supplied name to help with organization.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    /**
     * Identifies the resource.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * The ID of the billing group associated with the outbound proflile. Defaults to null (for no group assigned).
     */
    public function withBillingGroupID(?string $billingGroupID): self
    {
        $obj = clone $this;
        $obj->billing_group_id = $billingGroupID;

        return $obj;
    }

    public function withCallRecording(
        OutboundCallRecording $callRecording
    ): self {
        $obj = clone $this;
        $obj->call_recording = $callRecording;

        return $obj;
    }

    /**
     * (BETA) Specifies the time window and call limits for calls made using this outbound voice profile. Note that all times are UTC in 24-hour clock time.
     */
    public function withCallingWindow(CallingWindow $callingWindow): self
    {
        $obj = clone $this;
        $obj->calling_window = $callingWindow;

        return $obj;
    }

    /**
     * Must be no more than your global concurrent call limit. Null means no limit.
     */
    public function withConcurrentCallLimit(?int $concurrentCallLimit): self
    {
        $obj = clone $this;
        $obj->concurrent_call_limit = $concurrentCallLimit;

        return $obj;
    }

    /**
     * Amount of connections associated with this outbound voice profile.
     */
    public function withConnectionsCount(int $connectionsCount): self
    {
        $obj = clone $this;
        $obj->connections_count = $connectionsCount;

        return $obj;
    }

    /**
     * ISO 8601 formatted date-time indicating when the resource was created.
     */
    public function withCreatedAt(string $createdAt): self
    {
        $obj = clone $this;
        $obj->created_at = $createdAt;

        return $obj;
    }

    /**
     * The maximum amount of usage charges, in USD, you want Telnyx to allow on this outbound voice profile in a day before disallowing new calls.
     */
    public function withDailySpendLimit(string $dailySpendLimit): self
    {
        $obj = clone $this;
        $obj->daily_spend_limit = $dailySpendLimit;

        return $obj;
    }

    /**
     * Specifies whether to enforce the daily_spend_limit on this outbound voice profile.
     */
    public function withDailySpendLimitEnabled(
        bool $dailySpendLimitEnabled
    ): self {
        $obj = clone $this;
        $obj->daily_spend_limit_enabled = $dailySpendLimitEnabled;

        return $obj;
    }

    /**
     * Specifies whether the outbound voice profile can be used. Disabled profiles will result in outbound calls being blocked for the associated Connections.
     */
    public function withEnabled(bool $enabled): self
    {
        $obj = clone $this;
        $obj->enabled = $enabled;

        return $obj;
    }

    /**
     * Maximum rate (price per minute) for a Destination to be allowed when making outbound calls.
     */
    public function withMaxDestinationRate(float $maxDestinationRate): self
    {
        $obj = clone $this;
        $obj->max_destination_rate = $maxDestinationRate;

        return $obj;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj->record_type = $recordType;

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
        $obj->tags = $tags;

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
     * ISO 8601 formatted date-time indicating when the resource was updated.
     */
    public function withUpdatedAt(string $updatedAt): self
    {
        $obj = clone $this;
        $obj->updated_at = $updatedAt;

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
        $obj->whitelisted_destinations = $whitelistedDestinations;

        return $obj;
    }
}
