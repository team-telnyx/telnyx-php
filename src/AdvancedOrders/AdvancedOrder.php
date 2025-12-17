<?php

declare(strict_types=1);

namespace Telnyx\AdvancedOrders;

use Telnyx\AdvancedOrders\AdvancedOrder\Feature;
use Telnyx\AdvancedOrders\AdvancedOrder\PhoneNumberType;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type AdvancedOrderShape = array{
 *   areaCode?: string|null,
 *   comments?: string|null,
 *   countryCode?: string|null,
 *   customerReference?: string|null,
 *   features?: list<Feature|value-of<Feature>>|null,
 *   phoneNumberType?: null|PhoneNumberType|value-of<PhoneNumberType>,
 *   quantity?: int|null,
 *   requirementGroupID?: string|null,
 * }
 */
final class AdvancedOrder implements BaseModel
{
    /** @use SdkModel<AdvancedOrderShape> */
    use SdkModel;

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

    /** @var value-of<PhoneNumberType>|null $phoneNumberType */
    #[Optional('phone_number_type', enum: PhoneNumberType::class)]
    public ?string $phoneNumberType;

    #[Optional]
    public ?int $quantity;

    /**
     * The ID of the requirement group to associate with this advanced order.
     */
    #[Optional('requirement_group_id')]
    public ?string $requirementGroupID;

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
     * @param PhoneNumberType|value-of<PhoneNumberType>|null $phoneNumberType
     */
    public static function with(
        ?string $areaCode = null,
        ?string $comments = null,
        ?string $countryCode = null,
        ?string $customerReference = null,
        ?array $features = null,
        PhoneNumberType|string|null $phoneNumberType = null,
        ?int $quantity = null,
        ?string $requirementGroupID = null,
    ): self {
        $self = new self;

        null !== $areaCode && $self['areaCode'] = $areaCode;
        null !== $comments && $self['comments'] = $comments;
        null !== $countryCode && $self['countryCode'] = $countryCode;
        null !== $customerReference && $self['customerReference'] = $customerReference;
        null !== $features && $self['features'] = $features;
        null !== $phoneNumberType && $self['phoneNumberType'] = $phoneNumberType;
        null !== $quantity && $self['quantity'] = $quantity;
        null !== $requirementGroupID && $self['requirementGroupID'] = $requirementGroupID;

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
     * @param PhoneNumberType|value-of<PhoneNumberType> $phoneNumberType
     */
    public function withPhoneNumberType(
        PhoneNumberType|string $phoneNumberType
    ): self {
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
     * The ID of the requirement group to associate with this advanced order.
     */
    public function withRequirementGroupID(string $requirementGroupID): self
    {
        $self = clone $this;
        $self['requirementGroupID'] = $requirementGroupID;

        return $self;
    }
}
