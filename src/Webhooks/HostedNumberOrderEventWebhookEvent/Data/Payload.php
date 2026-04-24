<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\HostedNumberOrderEventWebhookEvent\Data;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Webhooks\HostedNumberOrderEventWebhookEvent\Data\Payload\Decision;
use Telnyx\Webhooks\HostedNumberOrderEventWebhookEvent\Data\Payload\Number;
use Telnyx\Webhooks\HostedNumberOrderEventWebhookEvent\Data\Payload\OrderStatus;

/**
 * Payload delivered with every messaging_hosted_numbers_orders.* event. `approval_deadline` and `decision` are meaningful only for `internal_transfer_*` events.
 *
 * @phpstan-import-type NumberShape from \Telnyx\Webhooks\HostedNumberOrderEventWebhookEvent\Data\Payload\Number
 *
 * @phpstan-type PayloadShape = array{
 *   approvalDeadline?: int|null,
 *   decision?: null|Decision|value-of<Decision>,
 *   numbers?: list<Number|NumberShape>|null,
 *   orderID?: string|null,
 *   orderStatus?: null|OrderStatus|value-of<OrderStatus>,
 *   profileID?: string|null,
 *   userID?: string|null,
 * }
 */
final class Payload implements BaseModel
{
    /** @use SdkModel<PayloadShape> */
    use SdkModel;

    /**
     * Unix timestamp (seconds) by which the losing organization must respond before auto-approval. Populated on internal-transfer events once an approval window has been issued.
     */
    #[Optional('approval_deadline', nullable: true)]
    public ?int $approvalDeadline;

    /**
     * Approval decision for the internal transfer. Defaults to `pending` for non-internal-transfer events.
     *
     * @var value-of<Decision>|null $decision
     */
    #[Optional(enum: Decision::class)]
    public ?string $decision;

    /** @var list<Number>|null $numbers */
    #[Optional(list: Number::class)]
    public ?array $numbers;

    /**
     * The ID of the hosted number order.
     */
    #[Optional('order_id')]
    public ?string $orderID;

    /**
     * Current status of the order.
     *
     * @var value-of<OrderStatus>|null $orderStatus
     */
    #[Optional('order_status', enum: OrderStatus::class)]
    public ?string $orderStatus;

    /**
     * The messaging profile associated with the order.
     */
    #[Optional('profile_id')]
    public ?string $profileID;

    /**
     * The organization that owns the order.
     */
    #[Optional('user_id')]
    public ?string $userID;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Decision|value-of<Decision>|null $decision
     * @param list<Number|NumberShape>|null $numbers
     * @param OrderStatus|value-of<OrderStatus>|null $orderStatus
     */
    public static function with(
        ?int $approvalDeadline = null,
        Decision|string|null $decision = null,
        ?array $numbers = null,
        ?string $orderID = null,
        OrderStatus|string|null $orderStatus = null,
        ?string $profileID = null,
        ?string $userID = null,
    ): self {
        $self = new self;

        null !== $approvalDeadline && $self['approvalDeadline'] = $approvalDeadline;
        null !== $decision && $self['decision'] = $decision;
        null !== $numbers && $self['numbers'] = $numbers;
        null !== $orderID && $self['orderID'] = $orderID;
        null !== $orderStatus && $self['orderStatus'] = $orderStatus;
        null !== $profileID && $self['profileID'] = $profileID;
        null !== $userID && $self['userID'] = $userID;

        return $self;
    }

    /**
     * Unix timestamp (seconds) by which the losing organization must respond before auto-approval. Populated on internal-transfer events once an approval window has been issued.
     */
    public function withApprovalDeadline(?int $approvalDeadline): self
    {
        $self = clone $this;
        $self['approvalDeadline'] = $approvalDeadline;

        return $self;
    }

    /**
     * Approval decision for the internal transfer. Defaults to `pending` for non-internal-transfer events.
     *
     * @param Decision|value-of<Decision> $decision
     */
    public function withDecision(Decision|string $decision): self
    {
        $self = clone $this;
        $self['decision'] = $decision;

        return $self;
    }

    /**
     * @param list<Number|NumberShape> $numbers
     */
    public function withNumbers(array $numbers): self
    {
        $self = clone $this;
        $self['numbers'] = $numbers;

        return $self;
    }

    /**
     * The ID of the hosted number order.
     */
    public function withOrderID(string $orderID): self
    {
        $self = clone $this;
        $self['orderID'] = $orderID;

        return $self;
    }

    /**
     * Current status of the order.
     *
     * @param OrderStatus|value-of<OrderStatus> $orderStatus
     */
    public function withOrderStatus(OrderStatus|string $orderStatus): self
    {
        $self = clone $this;
        $self['orderStatus'] = $orderStatus;

        return $self;
    }

    /**
     * The messaging profile associated with the order.
     */
    public function withProfileID(string $profileID): self
    {
        $self = clone $this;
        $self['profileID'] = $profileID;

        return $self;
    }

    /**
     * The organization that owns the order.
     */
    public function withUserID(string $userID): self
    {
        $self = clone $this;
        $self['userID'] = $userID;

        return $self;
    }
}
