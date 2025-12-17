<?php

declare(strict_types=1);

namespace Telnyx\AdvancedOrders;

use Telnyx\AdvancedOrders\AdvancedOrderGetResponse\Feature;
use Telnyx\AdvancedOrders\AdvancedOrderGetResponse\PhoneNumberType;
use Telnyx\AdvancedOrders\AdvancedOrderGetResponse\Status;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type AdvancedOrderGetResponseShape = array{
 *   id?: string|null,
 *   areaCode?: string|null,
 *   comments?: string|null,
 *   countryCode?: string|null,
 *   customerReference?: string|null,
 *   features?: list<Feature|value-of<Feature>>|null,
 *   orders?: list<string>|null,
 *   phoneNumberType?: list<PhoneNumberType|value-of<PhoneNumberType>>|null,
 *   quantity?: int|null,
 *   requirementGroupID?: string|null,
 *   status?: list<Status|value-of<Status>>|null,
 * }
 */
final class AdvancedOrderGetResponse implements BaseModel
{
    /** @use SdkModel<AdvancedOrderGetResponseShape> */
    use SdkModel;

    #[Optional]
    public ?string $id;

    #[Optional('area_code')]
    public ?string $areaCode;

    #[Optional]
    public ?string $comments;

    #[Optional('country_code')]
    public ?string $countryCode;

    #[Optional('customer_reference')]
    public ?string $customerReference;

    /** @var list<value-of<Feature>>|null $features */
    #[Optional(list: Feature::class)]
    public ?array $features;

    /** @var list<string>|null $orders */
    #[Optional(list: 'string')]
    public ?array $orders;

    /** @var list<value-of<PhoneNumberType>>|null $phoneNumberType */
    #[Optional('phone_number_type', list: PhoneNumberType::class)]
    public ?array $phoneNumberType;

    #[Optional]
    public ?int $quantity;

    /**
     * The ID of the requirement group associated with this advanced order.
     */
    #[Optional('requirement_group_id')]
    public ?string $requirementGroupID;

    /** @var list<value-of<Status>>|null $status */
    #[Optional(list: Status::class)]
    public ?array $status;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<Feature|value-of<Feature>>|null $features
     * @param list<string>|null $orders
     * @param list<PhoneNumberType|value-of<PhoneNumberType>>|null $phoneNumberType
     * @param list<Status|value-of<Status>>|null $status
     */
    public static function with(
        ?string $id = null,
        ?string $areaCode = null,
        ?string $comments = null,
        ?string $countryCode = null,
        ?string $customerReference = null,
        ?array $features = null,
        ?array $orders = null,
        ?array $phoneNumberType = null,
        ?int $quantity = null,
        ?string $requirementGroupID = null,
        ?array $status = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $areaCode && $self['areaCode'] = $areaCode;
        null !== $comments && $self['comments'] = $comments;
        null !== $countryCode && $self['countryCode'] = $countryCode;
        null !== $customerReference && $self['customerReference'] = $customerReference;
        null !== $features && $self['features'] = $features;
        null !== $orders && $self['orders'] = $orders;
        null !== $phoneNumberType && $self['phoneNumberType'] = $phoneNumberType;
        null !== $quantity && $self['quantity'] = $quantity;
        null !== $requirementGroupID && $self['requirementGroupID'] = $requirementGroupID;
        null !== $status && $self['status'] = $status;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withAreaCode(string $areaCode): self
    {
        $self = clone $this;
        $self['areaCode'] = $areaCode;

        return $self;
    }

    public function withComments(string $comments): self
    {
        $self = clone $this;
        $self['comments'] = $comments;

        return $self;
    }

    public function withCountryCode(string $countryCode): self
    {
        $self = clone $this;
        $self['countryCode'] = $countryCode;

        return $self;
    }

    public function withCustomerReference(string $customerReference): self
    {
        $self = clone $this;
        $self['customerReference'] = $customerReference;

        return $self;
    }

    /**
     * @param list<Feature|value-of<Feature>> $features
     */
    public function withFeatures(array $features): self
    {
        $self = clone $this;
        $self['features'] = $features;

        return $self;
    }

    /**
     * @param list<string> $orders
     */
    public function withOrders(array $orders): self
    {
        $self = clone $this;
        $self['orders'] = $orders;

        return $self;
    }

    /**
     * @param list<PhoneNumberType|value-of<PhoneNumberType>> $phoneNumberType
     */
    public function withPhoneNumberType(array $phoneNumberType): self
    {
        $self = clone $this;
        $self['phoneNumberType'] = $phoneNumberType;

        return $self;
    }

    public function withQuantity(int $quantity): self
    {
        $self = clone $this;
        $self['quantity'] = $quantity;

        return $self;
    }

    /**
     * The ID of the requirement group associated with this advanced order.
     */
    public function withRequirementGroupID(string $requirementGroupID): self
    {
        $self = clone $this;
        $self['requirementGroupID'] = $requirementGroupID;

        return $self;
    }

    /**
     * @param list<Status|value-of<Status>> $status
     */
    public function withStatus(array $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }
}
