<?php

declare(strict_types=1);

namespace Telnyx\DetailRecords\DetailRecordListResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\DetailRecords\DetailRecordListResponse\AmdDetailRecord\Feature;

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
 *   feature?: null|Feature|value-of<Feature>,
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
     * @param Feature|value-of<Feature>|null $feature
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
        $self = new self;

        $self['recordType'] = $recordType;

        null !== $id && $self['id'] = $id;
        null !== $billingGroupID && $self['billingGroupID'] = $billingGroupID;
        null !== $billingGroupName && $self['billingGroupName'] = $billingGroupName;
        null !== $callLegID && $self['callLegID'] = $callLegID;
        null !== $callSessionID && $self['callSessionID'] = $callSessionID;
        null !== $connectionID && $self['connectionID'] = $connectionID;
        null !== $connectionName && $self['connectionName'] = $connectionName;
        null !== $cost && $self['cost'] = $cost;
        null !== $currency && $self['currency'] = $currency;
        null !== $feature && $self['feature'] = $feature;
        null !== $invokedAt && $self['invokedAt'] = $invokedAt;
        null !== $isTelnyxBillable && $self['isTelnyxBillable'] = $isTelnyxBillable;
        null !== $rate && $self['rate'] = $rate;
        null !== $rateMeasuredIn && $self['rateMeasuredIn'] = $rateMeasuredIn;
        null !== $tags && $self['tags'] = $tags;

        return $self;
    }

    public function withRecordType(string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }

    /**
     * Feature invocation id.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * Billing Group id.
     */
    public function withBillingGroupID(string $billingGroupID): self
    {
        $self = clone $this;
        $self['billingGroupID'] = $billingGroupID;

        return $self;
    }

    /**
     * Name of the Billing Group specified in billing_group_id.
     */
    public function withBillingGroupName(string $billingGroupName): self
    {
        $self = clone $this;
        $self['billingGroupName'] = $billingGroupName;

        return $self;
    }

    /**
     * Telnyx UUID that identifies the related call leg.
     */
    public function withCallLegID(string $callLegID): self
    {
        $self = clone $this;
        $self['callLegID'] = $callLegID;

        return $self;
    }

    /**
     * Telnyx UUID that identifies the related call session.
     */
    public function withCallSessionID(string $callSessionID): self
    {
        $self = clone $this;
        $self['callSessionID'] = $callSessionID;

        return $self;
    }

    /**
     * Connection id.
     */
    public function withConnectionID(string $connectionID): self
    {
        $self = clone $this;
        $self['connectionID'] = $connectionID;

        return $self;
    }

    /**
     * Connection name.
     */
    public function withConnectionName(string $connectionName): self
    {
        $self = clone $this;
        $self['connectionName'] = $connectionName;

        return $self;
    }

    /**
     * Currency amount for Telnyx billing cost.
     */
    public function withCost(string $cost): self
    {
        $self = clone $this;
        $self['cost'] = $cost;

        return $self;
    }

    /**
     * Telnyx account currency used to describe monetary values, including billing cost.
     */
    public function withCurrency(string $currency): self
    {
        $self = clone $this;
        $self['currency'] = $currency;

        return $self;
    }

    /**
     * Feature name.
     *
     * @param Feature|value-of<Feature> $feature
     */
    public function withFeature(Feature|string $feature): self
    {
        $self = clone $this;
        $self['feature'] = $feature;

        return $self;
    }

    /**
     * Feature invocation time.
     */
    public function withInvokedAt(\DateTimeInterface $invokedAt): self
    {
        $self = clone $this;
        $self['invokedAt'] = $invokedAt;

        return $self;
    }

    /**
     * Indicates whether Telnyx billing charges might be applicable.
     */
    public function withIsTelnyxBillable(bool $isTelnyxBillable): self
    {
        $self = clone $this;
        $self['isTelnyxBillable'] = $isTelnyxBillable;

        return $self;
    }

    /**
     * Currency amount per billing unit used to calculate the Telnyx billing cost.
     */
    public function withRate(string $rate): self
    {
        $self = clone $this;
        $self['rate'] = $rate;

        return $self;
    }

    /**
     * Billing unit used to calculate the Telnyx billing cost.
     */
    public function withRateMeasuredIn(string $rateMeasuredIn): self
    {
        $self = clone $this;
        $self['rateMeasuredIn'] = $rateMeasuredIn;

        return $self;
    }

    /**
     * User-provided tags.
     */
    public function withTags(string $tags): self
    {
        $self = clone $this;
        $self['tags'] = $tags;

        return $self;
    }
}
