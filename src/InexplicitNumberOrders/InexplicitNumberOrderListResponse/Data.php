<?php

declare(strict_types=1);

namespace Telnyx\InexplicitNumberOrders\InexplicitNumberOrderListResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\InexplicitNumberOrders\InexplicitNumberOrderListResponse\Data\OrderingGroup;
use Telnyx\InexplicitNumberOrders\InexplicitNumberOrderListResponse\Data\OrderingGroup\Order;
use Telnyx\InexplicitNumberOrders\InexplicitNumberOrderListResponse\Data\OrderingGroup\Status;
use Telnyx\InexplicitNumberOrders\InexplicitNumberOrderListResponse\Data\OrderingGroup\Strategy;

/**
 * @phpstan-type DataShape = array{
 *   id?: string|null,
 *   billingGroupID?: string|null,
 *   connectionID?: string|null,
 *   createdAt?: \DateTimeInterface|null,
 *   customerReference?: string|null,
 *   messagingProfileID?: string|null,
 *   orderingGroups?: list<OrderingGroup>|null,
 *   updatedAt?: \DateTimeInterface|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * Unique identifier for the inexplicit number order.
     */
    #[Optional]
    public ?string $id;

    /**
     * Billing group id to apply to phone numbers that are purchased.
     */
    #[Optional('billing_group_id')]
    public ?string $billingGroupID;

    /**
     * Connection id to apply to phone numbers that are purchased.
     */
    #[Optional('connection_id')]
    public ?string $connectionID;

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    #[Optional('created_at')]
    public ?\DateTimeInterface $createdAt;

    /**
     * Reference label for the customer.
     */
    #[Optional('customer_reference')]
    public ?string $customerReference;

    /**
     * Messaging profile id to apply to phone numbers that are purchased.
     */
    #[Optional('messaging_profile_id')]
    public ?string $messagingProfileID;

    /** @var list<OrderingGroup>|null $orderingGroups */
    #[Optional('ordering_groups', list: OrderingGroup::class)]
    public ?array $orderingGroups;

    /**
     * ISO 8601 formatted date indicating when the resource was updated.
     */
    #[Optional('updated_at')]
    public ?\DateTimeInterface $updatedAt;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<OrderingGroup|array{
     *   administrativeArea?: string|null,
     *   countAllocated?: int|null,
     *   countRequested?: int|null,
     *   countryISO?: string|null,
     *   createdAt?: \DateTimeInterface|null,
     *   errorReason?: string|null,
     *   excludeHeldNumbers?: bool|null,
     *   nationalDestinationCode?: string|null,
     *   orders?: list<Order>|null,
     *   phoneNumberType?: string|null,
     *   phoneNumberContains?: string|null,
     *   phoneNumberEndsWith?: string|null,
     *   phoneNumberStartsWith?: string|null,
     *   quickship?: bool|null,
     *   status?: value-of<Status>|null,
     *   strategy?: value-of<Strategy>|null,
     *   updatedAt?: \DateTimeInterface|null,
     * }> $orderingGroups
     */
    public static function with(
        ?string $id = null,
        ?string $billingGroupID = null,
        ?string $connectionID = null,
        ?\DateTimeInterface $createdAt = null,
        ?string $customerReference = null,
        ?string $messagingProfileID = null,
        ?array $orderingGroups = null,
        ?\DateTimeInterface $updatedAt = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $billingGroupID && $self['billingGroupID'] = $billingGroupID;
        null !== $connectionID && $self['connectionID'] = $connectionID;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $customerReference && $self['customerReference'] = $customerReference;
        null !== $messagingProfileID && $self['messagingProfileID'] = $messagingProfileID;
        null !== $orderingGroups && $self['orderingGroups'] = $orderingGroups;
        null !== $updatedAt && $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * Unique identifier for the inexplicit number order.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * Billing group id to apply to phone numbers that are purchased.
     */
    public function withBillingGroupID(string $billingGroupID): self
    {
        $self = clone $this;
        $self['billingGroupID'] = $billingGroupID;

        return $self;
    }

    /**
     * Connection id to apply to phone numbers that are purchased.
     */
    public function withConnectionID(string $connectionID): self
    {
        $self = clone $this;
        $self['connectionID'] = $connectionID;

        return $self;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * Reference label for the customer.
     */
    public function withCustomerReference(string $customerReference): self
    {
        $self = clone $this;
        $self['customerReference'] = $customerReference;

        return $self;
    }

    /**
     * Messaging profile id to apply to phone numbers that are purchased.
     */
    public function withMessagingProfileID(string $messagingProfileID): self
    {
        $self = clone $this;
        $self['messagingProfileID'] = $messagingProfileID;

        return $self;
    }

    /**
     * @param list<OrderingGroup|array{
     *   administrativeArea?: string|null,
     *   countAllocated?: int|null,
     *   countRequested?: int|null,
     *   countryISO?: string|null,
     *   createdAt?: \DateTimeInterface|null,
     *   errorReason?: string|null,
     *   excludeHeldNumbers?: bool|null,
     *   nationalDestinationCode?: string|null,
     *   orders?: list<Order>|null,
     *   phoneNumberType?: string|null,
     *   phoneNumberContains?: string|null,
     *   phoneNumberEndsWith?: string|null,
     *   phoneNumberStartsWith?: string|null,
     *   quickship?: bool|null,
     *   status?: value-of<Status>|null,
     *   strategy?: value-of<Strategy>|null,
     *   updatedAt?: \DateTimeInterface|null,
     * }> $orderingGroups
     */
    public function withOrderingGroups(array $orderingGroups): self
    {
        $self = clone $this;
        $self['orderingGroups'] = $orderingGroups;

        return $self;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was updated.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }
}
