<?php

declare(strict_types=1);

namespace Telnyx\OutboundVoiceProfiles;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new OutboundVoiceProfileUpdateParams); // set properties as needed
 * $client->outboundVoiceProfiles->update(...$params->toArray());
 * ```
 * Updates an existing outbound voice profile.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->outboundVoiceProfiles->update(...$params->toArray());`
 *
 * @see Telnyx\OutboundVoiceProfiles->update
 *
 * @phpstan-type outbound_voice_profile_update_params = array{
 *   name: string,
 *   billingGroupID?: string|null,
 *   callRecording?: OutboundCallRecording,
 *   concurrentCallLimit?: int|null,
 *   dailySpendLimit?: string,
 *   dailySpendLimitEnabled?: bool,
 *   enabled?: bool,
 *   maxDestinationRate?: float,
 *   servicePlan?: ServicePlan|value-of<ServicePlan>,
 *   tags?: list<string>,
 *   trafficType?: TrafficType|value-of<TrafficType>,
 *   usagePaymentMethod?: UsagePaymentMethod|value-of<UsagePaymentMethod>,
 *   whitelistedDestinations?: list<string>,
 * }
 */
final class OutboundVoiceProfileUpdateParams implements BaseModel
{
    /** @use SdkModel<outbound_voice_profile_update_params> */
    use SdkModel;
    use SdkParams;

    /**
     * A user-supplied name to help with organization.
     */
    #[Api]
    public string $name;

    /**
     * The ID of the billing group associated with the outbound proflile. Defaults to null (for no group assigned).
     */
    #[Api('billing_group_id', nullable: true, optional: true)]
    public ?string $billingGroupID;

    #[Api('call_recording', optional: true)]
    public ?OutboundCallRecording $callRecording;

    /**
     * Must be no more than your global concurrent call limit. Null means no limit.
     */
    #[Api('concurrent_call_limit', nullable: true, optional: true)]
    public ?int $concurrentCallLimit;

    /**
     * The maximum amount of usage charges, in USD, you want Telnyx to allow on this outbound voice profile in a day before disallowing new calls.
     */
    #[Api('daily_spend_limit', optional: true)]
    public ?string $dailySpendLimit;

    /**
     * Specifies whether to enforce the daily_spend_limit on this outbound voice profile.
     */
    #[Api('daily_spend_limit_enabled', optional: true)]
    public ?bool $dailySpendLimitEnabled;

    /**
     * Specifies whether the outbound voice profile can be used. Disabled profiles will result in outbound calls being blocked for the associated Connections.
     */
    #[Api(optional: true)]
    public ?bool $enabled;

    /**
     * Maximum rate (price per minute) for a Destination to be allowed when making outbound calls.
     */
    #[Api('max_destination_rate', optional: true)]
    public ?float $maxDestinationRate;

    /**
     * Indicates the coverage of the termination regions.
     *
     * @var value-of<ServicePlan>|null $servicePlan
     */
    #[Api('service_plan', enum: ServicePlan::class, optional: true)]
    public ?string $servicePlan;

    /** @var list<string>|null $tags */
    #[Api(list: 'string', optional: true)]
    public ?array $tags;

    /**
     * Specifies the type of traffic allowed in this profile.
     *
     * @var value-of<TrafficType>|null $trafficType
     */
    #[Api('traffic_type', enum: TrafficType::class, optional: true)]
    public ?string $trafficType;

    /**
     * Setting for how costs for outbound profile are calculated.
     *
     * @var value-of<UsagePaymentMethod>|null $usagePaymentMethod
     */
    #[Api(
        'usage_payment_method',
        enum: UsagePaymentMethod::class,
        optional: true
    )]
    public ?string $usagePaymentMethod;

    /**
     * The list of destinations you want to be able to call using this outbound voice profile formatted in alpha2.
     *
     * @var list<string>|null $whitelistedDestinations
     */
    #[Api('whitelisted_destinations', list: 'string', optional: true)]
    public ?array $whitelistedDestinations;

    /**
     * `new OutboundVoiceProfileUpdateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * OutboundVoiceProfileUpdateParams::with(name: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new OutboundVoiceProfileUpdateParams)->withName(...)
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
     * @param ServicePlan|value-of<ServicePlan> $servicePlan
     * @param list<string> $tags
     * @param TrafficType|value-of<TrafficType> $trafficType
     * @param UsagePaymentMethod|value-of<UsagePaymentMethod> $usagePaymentMethod
     * @param list<string> $whitelistedDestinations
     */
    public static function with(
        string $name,
        ?string $billingGroupID = null,
        ?OutboundCallRecording $callRecording = null,
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
        $obj = new self;

        $obj->name = $name;

        null !== $billingGroupID && $obj->billingGroupID = $billingGroupID;
        null !== $callRecording && $obj->callRecording = $callRecording;
        null !== $concurrentCallLimit && $obj->concurrentCallLimit = $concurrentCallLimit;
        null !== $dailySpendLimit && $obj->dailySpendLimit = $dailySpendLimit;
        null !== $dailySpendLimitEnabled && $obj->dailySpendLimitEnabled = $dailySpendLimitEnabled;
        null !== $enabled && $obj->enabled = $enabled;
        null !== $maxDestinationRate && $obj->maxDestinationRate = $maxDestinationRate;
        null !== $servicePlan && $obj->servicePlan = $servicePlan instanceof ServicePlan ? $servicePlan->value : $servicePlan;
        null !== $tags && $obj->tags = $tags;
        null !== $trafficType && $obj->trafficType = $trafficType instanceof TrafficType ? $trafficType->value : $trafficType;
        null !== $usagePaymentMethod && $obj->usagePaymentMethod = $usagePaymentMethod instanceof UsagePaymentMethod ? $usagePaymentMethod->value : $usagePaymentMethod;
        null !== $whitelistedDestinations && $obj->whitelistedDestinations = $whitelistedDestinations;

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
     * The ID of the billing group associated with the outbound proflile. Defaults to null (for no group assigned).
     */
    public function withBillingGroupID(?string $billingGroupID): self
    {
        $obj = clone $this;
        $obj->billingGroupID = $billingGroupID;

        return $obj;
    }

    public function withCallRecording(
        OutboundCallRecording $callRecording
    ): self {
        $obj = clone $this;
        $obj->callRecording = $callRecording;

        return $obj;
    }

    /**
     * Must be no more than your global concurrent call limit. Null means no limit.
     */
    public function withConcurrentCallLimit(?int $concurrentCallLimit): self
    {
        $obj = clone $this;
        $obj->concurrentCallLimit = $concurrentCallLimit;

        return $obj;
    }

    /**
     * The maximum amount of usage charges, in USD, you want Telnyx to allow on this outbound voice profile in a day before disallowing new calls.
     */
    public function withDailySpendLimit(string $dailySpendLimit): self
    {
        $obj = clone $this;
        $obj->dailySpendLimit = $dailySpendLimit;

        return $obj;
    }

    /**
     * Specifies whether to enforce the daily_spend_limit on this outbound voice profile.
     */
    public function withDailySpendLimitEnabled(
        bool $dailySpendLimitEnabled
    ): self {
        $obj = clone $this;
        $obj->dailySpendLimitEnabled = $dailySpendLimitEnabled;

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
        $obj->maxDestinationRate = $maxDestinationRate;

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
        $obj->servicePlan = $servicePlan instanceof ServicePlan ? $servicePlan->value : $servicePlan;

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
        $obj->trafficType = $trafficType instanceof TrafficType ? $trafficType->value : $trafficType;

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
        $obj->usagePaymentMethod = $usagePaymentMethod instanceof UsagePaymentMethod ? $usagePaymentMethod->value : $usagePaymentMethod;

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
        $obj->whitelistedDestinations = $whitelistedDestinations;

        return $obj;
    }
}
