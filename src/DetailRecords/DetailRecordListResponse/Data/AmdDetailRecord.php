<?php

declare(strict_types=1);

namespace Telnyx\DetailRecords\DetailRecordListResponse\Data;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\DetailRecords\DetailRecordListResponse\Data\AmdDetailRecord\Feature;

/**
 * @phpstan-type AmdDetailRecordShape = array{
 *   record_type: string,
 *   id?: string|null,
 *   billing_group_id?: string|null,
 *   billing_group_name?: string|null,
 *   call_leg_id?: string|null,
 *   call_session_id?: string|null,
 *   connection_id?: string|null,
 *   connection_name?: string|null,
 *   cost?: string|null,
 *   currency?: string|null,
 *   feature?: value-of<Feature>|null,
 *   invoked_at?: \DateTimeInterface|null,
 *   is_telnyx_billable?: bool|null,
 *   rate?: string|null,
 *   rate_measured_in?: string|null,
 *   tags?: string|null,
 * }
 */
final class AmdDetailRecord implements BaseModel
{
    /** @use SdkModel<AmdDetailRecordShape> */
    use SdkModel;

    #[Required]
    public string $record_type;

    /**
     * Feature invocation id.
     */
    #[Optional]
    public ?string $id;

    /**
     * Billing Group id.
     */
    #[Optional]
    public ?string $billing_group_id;

    /**
     * Name of the Billing Group specified in billing_group_id.
     */
    #[Optional]
    public ?string $billing_group_name;

    /**
     * Telnyx UUID that identifies the related call leg.
     */
    #[Optional]
    public ?string $call_leg_id;

    /**
     * Telnyx UUID that identifies the related call session.
     */
    #[Optional]
    public ?string $call_session_id;

    /**
     * Connection id.
     */
    #[Optional]
    public ?string $connection_id;

    /**
     * Connection name.
     */
    #[Optional]
    public ?string $connection_name;

    /**
     * Currency amount for Telnyx billing cost.
     */
    #[Optional]
    public ?string $cost;

    /**
     * Telnyx account currency used to describe monetary values, including billing cost.
     */
    #[Optional]
    public ?string $currency;

    /**
     * Feature name.
     *
     * @var value-of<Feature>|null $feature
     */
    #[Optional(enum: Feature::class)]
    public ?string $feature;

    /**
     * Feature invocation time.
     */
    #[Optional]
    public ?\DateTimeInterface $invoked_at;

    /**
     * Indicates whether Telnyx billing charges might be applicable.
     */
    #[Optional]
    public ?bool $is_telnyx_billable;

    /**
     * Currency amount per billing unit used to calculate the Telnyx billing cost.
     */
    #[Optional]
    public ?string $rate;

    /**
     * Billing unit used to calculate the Telnyx billing cost.
     */
    #[Optional]
    public ?string $rate_measured_in;

    /**
     * User-provided tags.
     */
    #[Optional]
    public ?string $tags;

    /**
     * `new AmdDetailRecord()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AmdDetailRecord::with(record_type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AmdDetailRecord)->withRecordType(...)
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
     * @param Feature|value-of<Feature> $feature
     */
    public static function with(
        string $record_type = 'amd_detail_record',
        ?string $id = null,
        ?string $billing_group_id = null,
        ?string $billing_group_name = null,
        ?string $call_leg_id = null,
        ?string $call_session_id = null,
        ?string $connection_id = null,
        ?string $connection_name = null,
        ?string $cost = null,
        ?string $currency = null,
        Feature|string|null $feature = null,
        ?\DateTimeInterface $invoked_at = null,
        ?bool $is_telnyx_billable = null,
        ?string $rate = null,
        ?string $rate_measured_in = null,
        ?string $tags = null,
    ): self {
        $obj = new self;

        $obj['record_type'] = $record_type;

        null !== $id && $obj['id'] = $id;
        null !== $billing_group_id && $obj['billing_group_id'] = $billing_group_id;
        null !== $billing_group_name && $obj['billing_group_name'] = $billing_group_name;
        null !== $call_leg_id && $obj['call_leg_id'] = $call_leg_id;
        null !== $call_session_id && $obj['call_session_id'] = $call_session_id;
        null !== $connection_id && $obj['connection_id'] = $connection_id;
        null !== $connection_name && $obj['connection_name'] = $connection_name;
        null !== $cost && $obj['cost'] = $cost;
        null !== $currency && $obj['currency'] = $currency;
        null !== $feature && $obj['feature'] = $feature;
        null !== $invoked_at && $obj['invoked_at'] = $invoked_at;
        null !== $is_telnyx_billable && $obj['is_telnyx_billable'] = $is_telnyx_billable;
        null !== $rate && $obj['rate'] = $rate;
        null !== $rate_measured_in && $obj['rate_measured_in'] = $rate_measured_in;
        null !== $tags && $obj['tags'] = $tags;

        return $obj;
    }

    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj['record_type'] = $recordType;

        return $obj;
    }

    /**
     * Feature invocation id.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * Billing Group id.
     */
    public function withBillingGroupID(string $billingGroupID): self
    {
        $obj = clone $this;
        $obj['billing_group_id'] = $billingGroupID;

        return $obj;
    }

    /**
     * Name of the Billing Group specified in billing_group_id.
     */
    public function withBillingGroupName(string $billingGroupName): self
    {
        $obj = clone $this;
        $obj['billing_group_name'] = $billingGroupName;

        return $obj;
    }

    /**
     * Telnyx UUID that identifies the related call leg.
     */
    public function withCallLegID(string $callLegID): self
    {
        $obj = clone $this;
        $obj['call_leg_id'] = $callLegID;

        return $obj;
    }

    /**
     * Telnyx UUID that identifies the related call session.
     */
    public function withCallSessionID(string $callSessionID): self
    {
        $obj = clone $this;
        $obj['call_session_id'] = $callSessionID;

        return $obj;
    }

    /**
     * Connection id.
     */
    public function withConnectionID(string $connectionID): self
    {
        $obj = clone $this;
        $obj['connection_id'] = $connectionID;

        return $obj;
    }

    /**
     * Connection name.
     */
    public function withConnectionName(string $connectionName): self
    {
        $obj = clone $this;
        $obj['connection_name'] = $connectionName;

        return $obj;
    }

    /**
     * Currency amount for Telnyx billing cost.
     */
    public function withCost(string $cost): self
    {
        $obj = clone $this;
        $obj['cost'] = $cost;

        return $obj;
    }

    /**
     * Telnyx account currency used to describe monetary values, including billing cost.
     */
    public function withCurrency(string $currency): self
    {
        $obj = clone $this;
        $obj['currency'] = $currency;

        return $obj;
    }

    /**
     * Feature name.
     *
     * @param Feature|value-of<Feature> $feature
     */
    public function withFeature(Feature|string $feature): self
    {
        $obj = clone $this;
        $obj['feature'] = $feature;

        return $obj;
    }

    /**
     * Feature invocation time.
     */
    public function withInvokedAt(\DateTimeInterface $invokedAt): self
    {
        $obj = clone $this;
        $obj['invoked_at'] = $invokedAt;

        return $obj;
    }

    /**
     * Indicates whether Telnyx billing charges might be applicable.
     */
    public function withIsTelnyxBillable(bool $isTelnyxBillable): self
    {
        $obj = clone $this;
        $obj['is_telnyx_billable'] = $isTelnyxBillable;

        return $obj;
    }

    /**
     * Currency amount per billing unit used to calculate the Telnyx billing cost.
     */
    public function withRate(string $rate): self
    {
        $obj = clone $this;
        $obj['rate'] = $rate;

        return $obj;
    }

    /**
     * Billing unit used to calculate the Telnyx billing cost.
     */
    public function withRateMeasuredIn(string $rateMeasuredIn): self
    {
        $obj = clone $this;
        $obj['rate_measured_in'] = $rateMeasuredIn;

        return $obj;
    }

    /**
     * User-provided tags.
     */
    public function withTags(string $tags): self
    {
        $obj = clone $this;
        $obj['tags'] = $tags;

        return $obj;
    }
}
