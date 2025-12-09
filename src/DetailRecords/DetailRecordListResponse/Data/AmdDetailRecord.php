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
 *   recordType: string,
 *   id?: string|null,
 *   billingGroupID?: string|null,
 *   billingGroupName?: string|null,
 *   callLegID?: string|null,
 *   callSessionID?: string|null,
 *   connectionID?: string|null,
 *   connectionName?: string|null,
 *   cost?: string|null,
 *   currency?: string|null,
 *   feature?: value-of<Feature>|null,
 *   invokedAt?: \DateTimeInterface|null,
 *   isTelnyxBillable?: bool|null,
 *   rate?: string|null,
 *   rateMeasuredIn?: string|null,
 *   tags?: string|null,
 * }
 */
final class AmdDetailRecord implements BaseModel
{
    /** @use SdkModel<AmdDetailRecordShape> */
    use SdkModel;

    #[Required('record_type')]
    public string $recordType;

    /**
     * Feature invocation id.
     */
    #[Optional]
    public ?string $id;

    /**
     * Billing Group id.
     */
    #[Optional('billing_group_id')]
    public ?string $billingGroupID;

    /**
     * Name of the Billing Group specified in billing_group_id.
     */
    #[Optional('billing_group_name')]
    public ?string $billingGroupName;

    /**
     * Telnyx UUID that identifies the related call leg.
     */
    #[Optional('call_leg_id')]
    public ?string $callLegID;

    /**
     * Telnyx UUID that identifies the related call session.
     */
    #[Optional('call_session_id')]
    public ?string $callSessionID;

    /**
     * Connection id.
     */
    #[Optional('connection_id')]
    public ?string $connectionID;

    /**
     * Connection name.
     */
    #[Optional('connection_name')]
    public ?string $connectionName;

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
    #[Optional('invoked_at')]
    public ?\DateTimeInterface $invokedAt;

    /**
     * Indicates whether Telnyx billing charges might be applicable.
     */
    #[Optional('is_telnyx_billable')]
    public ?bool $isTelnyxBillable;

    /**
     * Currency amount per billing unit used to calculate the Telnyx billing cost.
     */
    #[Optional]
    public ?string $rate;

    /**
     * Billing unit used to calculate the Telnyx billing cost.
     */
    #[Optional('rate_measured_in')]
    public ?string $rateMeasuredIn;

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
     * AmdDetailRecord::with(recordType: ...)
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
        string $recordType = 'amd_detail_record',
        ?string $id = null,
        ?string $billingGroupID = null,
        ?string $billingGroupName = null,
        ?string $callLegID = null,
        ?string $callSessionID = null,
        ?string $connectionID = null,
        ?string $connectionName = null,
        ?string $cost = null,
        ?string $currency = null,
        Feature|string|null $feature = null,
        ?\DateTimeInterface $invokedAt = null,
        ?bool $isTelnyxBillable = null,
        ?string $rate = null,
        ?string $rateMeasuredIn = null,
        ?string $tags = null,
    ): self {
        $obj = new self;

        $obj['recordType'] = $recordType;

        null !== $id && $obj['id'] = $id;
        null !== $billingGroupID && $obj['billingGroupID'] = $billingGroupID;
        null !== $billingGroupName && $obj['billingGroupName'] = $billingGroupName;
        null !== $callLegID && $obj['callLegID'] = $callLegID;
        null !== $callSessionID && $obj['callSessionID'] = $callSessionID;
        null !== $connectionID && $obj['connectionID'] = $connectionID;
        null !== $connectionName && $obj['connectionName'] = $connectionName;
        null !== $cost && $obj['cost'] = $cost;
        null !== $currency && $obj['currency'] = $currency;
        null !== $feature && $obj['feature'] = $feature;
        null !== $invokedAt && $obj['invokedAt'] = $invokedAt;
        null !== $isTelnyxBillable && $obj['isTelnyxBillable'] = $isTelnyxBillable;
        null !== $rate && $obj['rate'] = $rate;
        null !== $rateMeasuredIn && $obj['rateMeasuredIn'] = $rateMeasuredIn;
        null !== $tags && $obj['tags'] = $tags;

        return $obj;
    }

    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj['recordType'] = $recordType;

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
        $obj['billingGroupID'] = $billingGroupID;

        return $obj;
    }

    /**
     * Name of the Billing Group specified in billing_group_id.
     */
    public function withBillingGroupName(string $billingGroupName): self
    {
        $obj = clone $this;
        $obj['billingGroupName'] = $billingGroupName;

        return $obj;
    }

    /**
     * Telnyx UUID that identifies the related call leg.
     */
    public function withCallLegID(string $callLegID): self
    {
        $obj = clone $this;
        $obj['callLegID'] = $callLegID;

        return $obj;
    }

    /**
     * Telnyx UUID that identifies the related call session.
     */
    public function withCallSessionID(string $callSessionID): self
    {
        $obj = clone $this;
        $obj['callSessionID'] = $callSessionID;

        return $obj;
    }

    /**
     * Connection id.
     */
    public function withConnectionID(string $connectionID): self
    {
        $obj = clone $this;
        $obj['connectionID'] = $connectionID;

        return $obj;
    }

    /**
     * Connection name.
     */
    public function withConnectionName(string $connectionName): self
    {
        $obj = clone $this;
        $obj['connectionName'] = $connectionName;

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
        $obj['invokedAt'] = $invokedAt;

        return $obj;
    }

    /**
     * Indicates whether Telnyx billing charges might be applicable.
     */
    public function withIsTelnyxBillable(bool $isTelnyxBillable): self
    {
        $obj = clone $this;
        $obj['isTelnyxBillable'] = $isTelnyxBillable;

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
        $obj['rateMeasuredIn'] = $rateMeasuredIn;

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
