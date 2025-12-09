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
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $billingGroupID && $obj['billingGroupID'] = $billingGroupID;
        null !== $connectionID && $obj['connectionID'] = $connectionID;
        null !== $createdAt && $obj['createdAt'] = $createdAt;
        null !== $customerReference && $obj['customerReference'] = $customerReference;
        null !== $messagingProfileID && $obj['messagingProfileID'] = $messagingProfileID;
        null !== $orderingGroups && $obj['orderingGroups'] = $orderingGroups;
        null !== $updatedAt && $obj['updatedAt'] = $updatedAt;

        return $obj;
    }

    /**
     * Unique identifier for the inexplicit number order.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * Billing group id to apply to phone numbers that are purchased.
     */
    public function withBillingGroupID(string $billingGroupID): self
    {
        $obj = clone $this;
        $obj['billingGroupID'] = $billingGroupID;

        return $obj;
    }

    /**
     * Connection id to apply to phone numbers that are purchased.
     */
    public function withConnectionID(string $connectionID): self
    {
        $obj = clone $this;
        $obj['connectionID'] = $connectionID;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj['createdAt'] = $createdAt;

        return $obj;
    }

    /**
     * Reference label for the customer.
     */
    public function withCustomerReference(string $customerReference): self
    {
        $obj = clone $this;
        $obj['customerReference'] = $customerReference;

        return $obj;
    }

    /**
     * Messaging profile id to apply to phone numbers that are purchased.
     */
    public function withMessagingProfileID(string $messagingProfileID): self
    {
        $obj = clone $this;
        $obj['messagingProfileID'] = $messagingProfileID;

        return $obj;
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
        $obj = clone $this;
        $obj['orderingGroups'] = $orderingGroups;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was updated.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj['updatedAt'] = $updatedAt;

        return $obj;
    }
}
