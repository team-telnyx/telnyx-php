<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallCostWebhookEvent\Data;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Webhooks\CallCostWebhookEvent\Data\Payload\CostPart;
use Telnyx\Webhooks\CallCostWebhookEvent\Data\Payload\Status;

/**
 * @phpstan-import-type CostPartShape from \Telnyx\Webhooks\CallCostWebhookEvent\Data\Payload\CostPart
 *
 * @phpstan-type PayloadShape = array{
 *   billedDurationSecs?: int|null,
 *   billingGroupID?: string|null,
 *   callControlID?: string|null,
 *   callLegID?: string|null,
 *   callSessionID?: string|null,
 *   clientState?: string|null,
 *   connectionID?: string|null,
 *   costParts?: list<CostPart|CostPartShape>|null,
 *   occurredAt?: \DateTimeInterface|null,
 *   status?: null|Status|value-of<Status>,
 *   totalCost?: string|null,
 * }
 */
final class Payload implements BaseModel
{
    /** @use SdkModel<PayloadShape> */
    use SdkModel;

    /**
     * The longest billed duration across all cost parts, in seconds.
     */
    #[Optional('billed_duration_secs', nullable: true)]
    public ?int $billedDurationSecs;

    /**
     * Identifies the billing group associated with the call.
     */
    #[Optional('billing_group_id', nullable: true)]
    public ?string $billingGroupID;

    /**
     * Call ID used to issue commands via Call Control API.
     */
    #[Optional('call_control_id')]
    public ?string $callControlID;

    /**
     * ID that is unique to the call and can be used to correlate webhook events.
     */
    #[Optional('call_leg_id')]
    public ?string $callLegID;

    /**
     * ID that is unique to the call session and can be used to correlate webhook events. Call session is a group of related call legs that logically belong to the same phone call, e.g. an inbound and outbound leg of a transferred call.
     */
    #[Optional('call_session_id')]
    public ?string $callSessionID;

    /**
     * State received from a command. Base64-encoded.
     */
    #[Optional('client_state')]
    public ?string $clientState;

    /**
     * Call Control App ID (formerly Telnyx connection ID) used in the call.
     */
    #[Optional('connection_id')]
    public ?string $connectionID;

    /**
     * Breakdown of costs by call part.
     *
     * @var list<CostPart>|null $costParts
     */
    #[Optional('cost_parts', list: CostPart::class)]
    public ?array $costParts;

    /**
     * ISO 8601 datetime of when the event occurred.
     */
    #[Optional('occurred_at')]
    public ?\DateTimeInterface $occurredAt;

    /**
     * The status of the cost calculation (`success` or `error`).
     *
     * @var value-of<Status>|null $status
     */
    #[Optional(enum: Status::class)]
    public ?string $status;

    /**
     * The total cost of the call.
     */
    #[Optional('total_cost', nullable: true)]
    public ?string $totalCost;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<CostPart|CostPartShape>|null $costParts
     * @param Status|value-of<Status>|null $status
     */
    public static function with(
        ?int $billedDurationSecs = null,
        ?string $billingGroupID = null,
        ?string $callControlID = null,
        ?string $callLegID = null,
        ?string $callSessionID = null,
        ?string $clientState = null,
        ?string $connectionID = null,
        ?array $costParts = null,
        ?\DateTimeInterface $occurredAt = null,
        Status|string|null $status = null,
        ?string $totalCost = null,
    ): self {
        $self = new self;

        null !== $billedDurationSecs && $self['billedDurationSecs'] = $billedDurationSecs;
        null !== $billingGroupID && $self['billingGroupID'] = $billingGroupID;
        null !== $callControlID && $self['callControlID'] = $callControlID;
        null !== $callLegID && $self['callLegID'] = $callLegID;
        null !== $callSessionID && $self['callSessionID'] = $callSessionID;
        null !== $clientState && $self['clientState'] = $clientState;
        null !== $connectionID && $self['connectionID'] = $connectionID;
        null !== $costParts && $self['costParts'] = $costParts;
        null !== $occurredAt && $self['occurredAt'] = $occurredAt;
        null !== $status && $self['status'] = $status;
        null !== $totalCost && $self['totalCost'] = $totalCost;

        return $self;
    }

    /**
     * The longest billed duration across all cost parts, in seconds.
     */
    public function withBilledDurationSecs(?int $billedDurationSecs): self
    {
        $self = clone $this;
        $self['billedDurationSecs'] = $billedDurationSecs;

        return $self;
    }

    /**
     * Identifies the billing group associated with the call.
     */
    public function withBillingGroupID(?string $billingGroupID): self
    {
        $self = clone $this;
        $self['billingGroupID'] = $billingGroupID;

        return $self;
    }

    /**
     * Call ID used to issue commands via Call Control API.
     */
    public function withCallControlID(string $callControlID): self
    {
        $self = clone $this;
        $self['callControlID'] = $callControlID;

        return $self;
    }

    /**
     * ID that is unique to the call and can be used to correlate webhook events.
     */
    public function withCallLegID(string $callLegID): self
    {
        $self = clone $this;
        $self['callLegID'] = $callLegID;

        return $self;
    }

    /**
     * ID that is unique to the call session and can be used to correlate webhook events. Call session is a group of related call legs that logically belong to the same phone call, e.g. an inbound and outbound leg of a transferred call.
     */
    public function withCallSessionID(string $callSessionID): self
    {
        $self = clone $this;
        $self['callSessionID'] = $callSessionID;

        return $self;
    }

    /**
     * State received from a command. Base64-encoded.
     */
    public function withClientState(string $clientState): self
    {
        $self = clone $this;
        $self['clientState'] = $clientState;

        return $self;
    }

    /**
     * Call Control App ID (formerly Telnyx connection ID) used in the call.
     */
    public function withConnectionID(string $connectionID): self
    {
        $self = clone $this;
        $self['connectionID'] = $connectionID;

        return $self;
    }

    /**
     * Breakdown of costs by call part.
     *
     * @param list<CostPart|CostPartShape> $costParts
     */
    public function withCostParts(array $costParts): self
    {
        $self = clone $this;
        $self['costParts'] = $costParts;

        return $self;
    }

    /**
     * ISO 8601 datetime of when the event occurred.
     */
    public function withOccurredAt(\DateTimeInterface $occurredAt): self
    {
        $self = clone $this;
        $self['occurredAt'] = $occurredAt;

        return $self;
    }

    /**
     * The status of the cost calculation (`success` or `error`).
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    /**
     * The total cost of the call.
     */
    public function withTotalCost(?string $totalCost): self
    {
        $self = clone $this;
        $self['totalCost'] = $totalCost;

        return $self;
    }
}
