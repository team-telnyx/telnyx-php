<?php

declare(strict_types=1);

namespace Telnyx\InexplicitNumberOrders\InexplicitNumberOrderListResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\InexplicitNumberOrders\InexplicitNumberOrderListResponse\Data\OrderingGroup;

/**
 * @phpstan-type DataShape = array{
 *   id?: string|null,
 *   billing_group_id?: string|null,
 *   connection_id?: string|null,
 *   created_at?: \DateTimeInterface|null,
 *   customer_reference?: string|null,
 *   messaging_profile_id?: string|null,
 *   ordering_groups?: list<OrderingGroup>|null,
 *   updated_at?: \DateTimeInterface|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * Unique identifier for the inexplicit number order.
     */
    #[Api(optional: true)]
    public ?string $id;

    /**
     * Billing group id to apply to phone numbers that are purchased.
     */
    #[Api(optional: true)]
    public ?string $billing_group_id;

    /**
     * Connection id to apply to phone numbers that are purchased.
     */
    #[Api(optional: true)]
    public ?string $connection_id;

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $created_at;

    /**
     * Reference label for the customer.
     */
    #[Api(optional: true)]
    public ?string $customer_reference;

    /**
     * Messaging profile id to apply to phone numbers that are purchased.
     */
    #[Api(optional: true)]
    public ?string $messaging_profile_id;

    /** @var list<OrderingGroup>|null $ordering_groups */
    #[Api(list: OrderingGroup::class, optional: true)]
    public ?array $ordering_groups;

    /**
     * ISO 8601 formatted date indicating when the resource was updated.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $updated_at;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<OrderingGroup> $ordering_groups
     */
    public static function with(
        ?string $id = null,
        ?string $billing_group_id = null,
        ?string $connection_id = null,
        ?\DateTimeInterface $created_at = null,
        ?string $customer_reference = null,
        ?string $messaging_profile_id = null,
        ?array $ordering_groups = null,
        ?\DateTimeInterface $updated_at = null,
    ): self {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $billing_group_id && $obj->billing_group_id = $billing_group_id;
        null !== $connection_id && $obj->connection_id = $connection_id;
        null !== $created_at && $obj->created_at = $created_at;
        null !== $customer_reference && $obj->customer_reference = $customer_reference;
        null !== $messaging_profile_id && $obj->messaging_profile_id = $messaging_profile_id;
        null !== $ordering_groups && $obj->ordering_groups = $ordering_groups;
        null !== $updated_at && $obj->updated_at = $updated_at;

        return $obj;
    }

    /**
     * Unique identifier for the inexplicit number order.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * Billing group id to apply to phone numbers that are purchased.
     */
    public function withBillingGroupID(string $billingGroupID): self
    {
        $obj = clone $this;
        $obj->billing_group_id = $billingGroupID;

        return $obj;
    }

    /**
     * Connection id to apply to phone numbers that are purchased.
     */
    public function withConnectionID(string $connectionID): self
    {
        $obj = clone $this;
        $obj->connection_id = $connectionID;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj->created_at = $createdAt;

        return $obj;
    }

    /**
     * Reference label for the customer.
     */
    public function withCustomerReference(string $customerReference): self
    {
        $obj = clone $this;
        $obj->customer_reference = $customerReference;

        return $obj;
    }

    /**
     * Messaging profile id to apply to phone numbers that are purchased.
     */
    public function withMessagingProfileID(string $messagingProfileID): self
    {
        $obj = clone $this;
        $obj->messaging_profile_id = $messagingProfileID;

        return $obj;
    }

    /**
     * @param list<OrderingGroup> $orderingGroups
     */
    public function withOrderingGroups(array $orderingGroups): self
    {
        $obj = clone $this;
        $obj->ordering_groups = $orderingGroups;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was updated.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj->updated_at = $updatedAt;

        return $obj;
    }
}
