<?php

declare(strict_types=1);

namespace Telnyx\InexplicitNumberOrders;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\InexplicitNumberOrders\InexplicitNumberOrderCreateParams\OrderingGroup;

/**
 * Create an inexplicit number order to programmatically purchase phone numbers without specifying exact numbers.
 *
 * @see Telnyx\Services\InexplicitNumberOrdersService::create()
 *
 * @phpstan-type InexplicitNumberOrderCreateParamsShape = array{
 *   ordering_groups: list<OrderingGroup>,
 *   billing_group_id?: string,
 *   connection_id?: string,
 *   customer_reference?: string,
 *   messaging_profile_id?: string,
 * }
 */
final class InexplicitNumberOrderCreateParams implements BaseModel
{
    /** @use SdkModel<InexplicitNumberOrderCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Group(s) of numbers to order. You can have multiple ordering_groups objects added to a single request.
     *
     * @var list<OrderingGroup> $ordering_groups
     */
    #[Api(list: OrderingGroup::class)]
    public array $ordering_groups;

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
     * Reference label for the customer.
     */
    #[Api(optional: true)]
    public ?string $customer_reference;

    /**
     * Messaging profile id to apply to phone numbers that are purchased.
     */
    #[Api(optional: true)]
    public ?string $messaging_profile_id;

    /**
     * `new InexplicitNumberOrderCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * InexplicitNumberOrderCreateParams::with(ordering_groups: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new InexplicitNumberOrderCreateParams)->withOrderingGroups(...)
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
     * @param list<OrderingGroup> $ordering_groups
     */
    public static function with(
        array $ordering_groups,
        ?string $billing_group_id = null,
        ?string $connection_id = null,
        ?string $customer_reference = null,
        ?string $messaging_profile_id = null,
    ): self {
        $obj = new self;

        $obj->ordering_groups = $ordering_groups;

        null !== $billing_group_id && $obj->billing_group_id = $billing_group_id;
        null !== $connection_id && $obj->connection_id = $connection_id;
        null !== $customer_reference && $obj->customer_reference = $customer_reference;
        null !== $messaging_profile_id && $obj->messaging_profile_id = $messaging_profile_id;

        return $obj;
    }

    /**
     * Group(s) of numbers to order. You can have multiple ordering_groups objects added to a single request.
     *
     * @param list<OrderingGroup> $orderingGroups
     */
    public function withOrderingGroups(array $orderingGroups): self
    {
        $obj = clone $this;
        $obj->ordering_groups = $orderingGroups;

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
}
