<?php

declare(strict_types=1);

namespace Telnyx\InexplicitNumberOrders;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\InexplicitNumberOrders\InexplicitNumberOrderCreateParams\OrderingGroup;
use Telnyx\InexplicitNumberOrders\InexplicitNumberOrderCreateParams\OrderingGroup\CountryISO;
use Telnyx\InexplicitNumberOrders\InexplicitNumberOrderCreateParams\OrderingGroup\PhoneNumber;
use Telnyx\InexplicitNumberOrders\InexplicitNumberOrderCreateParams\OrderingGroup\Strategy;

/**
 * Create an inexplicit number order to programmatically purchase phone numbers without specifying exact numbers.
 *
 * @see Telnyx\Services\InexplicitNumberOrdersService::create()
 *
 * @phpstan-type InexplicitNumberOrderCreateParamsShape = array{
 *   orderingGroups: list<OrderingGroup|array{
 *     countRequested: string,
 *     countryISO: value-of<CountryISO>,
 *     phoneNumberType: string,
 *     administrativeArea?: string|null,
 *     excludeHeldNumbers?: bool|null,
 *     features?: list<string>|null,
 *     locality?: string|null,
 *     nationalDestinationCode?: string|null,
 *     phoneNumber?: PhoneNumber|null,
 *     quickship?: bool|null,
 *     strategy?: value-of<Strategy>|null,
 *   }>,
 *   billingGroupID?: string,
 *   connectionID?: string,
 *   customerReference?: string,
 *   messagingProfileID?: string,
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
     * @var list<OrderingGroup> $orderingGroups
     */
    #[Required('ordering_groups', list: OrderingGroup::class)]
    public array $orderingGroups;

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
     * Reference label for the customer.
     */
    #[Optional('customer_reference')]
    public ?string $customerReference;

    /**
     * Messaging profile id to apply to phone numbers that are purchased.
     */
    #[Optional('messaging_profile_id')]
    public ?string $messagingProfileID;

    /**
     * `new InexplicitNumberOrderCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * InexplicitNumberOrderCreateParams::with(orderingGroups: ...)
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
     * @param list<OrderingGroup|array{
     *   countRequested: string,
     *   countryISO: value-of<CountryISO>,
     *   phoneNumberType: string,
     *   administrativeArea?: string|null,
     *   excludeHeldNumbers?: bool|null,
     *   features?: list<string>|null,
     *   locality?: string|null,
     *   nationalDestinationCode?: string|null,
     *   phoneNumber?: PhoneNumber|null,
     *   quickship?: bool|null,
     *   strategy?: value-of<Strategy>|null,
     * }> $orderingGroups
     */
    public static function with(
        array $orderingGroups,
        ?string $billingGroupID = null,
        ?string $connectionID = null,
        ?string $customerReference = null,
        ?string $messagingProfileID = null,
    ): self {
        $self = new self;

        $self['orderingGroups'] = $orderingGroups;

        null !== $billingGroupID && $self['billingGroupID'] = $billingGroupID;
        null !== $connectionID && $self['connectionID'] = $connectionID;
        null !== $customerReference && $self['customerReference'] = $customerReference;
        null !== $messagingProfileID && $self['messagingProfileID'] = $messagingProfileID;

        return $self;
    }

    /**
     * Group(s) of numbers to order. You can have multiple ordering_groups objects added to a single request.
     *
     * @param list<OrderingGroup|array{
     *   countRequested: string,
     *   countryISO: value-of<CountryISO>,
     *   phoneNumberType: string,
     *   administrativeArea?: string|null,
     *   excludeHeldNumbers?: bool|null,
     *   features?: list<string>|null,
     *   locality?: string|null,
     *   nationalDestinationCode?: string|null,
     *   phoneNumber?: PhoneNumber|null,
     *   quickship?: bool|null,
     *   strategy?: value-of<Strategy>|null,
     * }> $orderingGroups
     */
    public function withOrderingGroups(array $orderingGroups): self
    {
        $self = clone $this;
        $self['orderingGroups'] = $orderingGroups;

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
}
