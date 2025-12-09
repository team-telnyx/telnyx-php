<?php

declare(strict_types=1);

namespace Telnyx\AdvancedOrders;

use Telnyx\AdvancedOrders\AdvancedOrderUpdateRequirementGroupParams\Feature;
use Telnyx\AdvancedOrders\AdvancedOrderUpdateRequirementGroupParams\PhoneNumberType;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Update Advanced Order.
 *
 * @see Telnyx\Services\AdvancedOrdersService::updateRequirementGroup()
 *
 * @phpstan-type AdvancedOrderUpdateRequirementGroupParamsShape = array{
 *   areaCode?: string,
 *   comments?: string,
 *   countryCode?: string,
 *   customerReference?: string,
 *   features?: list<Feature|value-of<Feature>>,
 *   phoneNumberType?: PhoneNumberType|value-of<PhoneNumberType>,
 *   quantity?: int,
 *   requirementGroupID?: string,
 * }
 */
final class AdvancedOrderUpdateRequirementGroupParams implements BaseModel
{
    /** @use SdkModel<AdvancedOrderUpdateRequirementGroupParamsShape> */
    use SdkModel;
    use SdkParams;

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
     * @param list<Feature|value-of<Feature>> $features
     * @param PhoneNumberType|value-of<PhoneNumberType> $phoneNumberType
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
        $obj = new self;

        null !== $areaCode && $obj['areaCode'] = $areaCode;
        null !== $comments && $obj['comments'] = $comments;
        null !== $countryCode && $obj['countryCode'] = $countryCode;
        null !== $customerReference && $obj['customerReference'] = $customerReference;
        null !== $features && $obj['features'] = $features;
        null !== $phoneNumberType && $obj['phoneNumberType'] = $phoneNumberType;
        null !== $quantity && $obj['quantity'] = $quantity;
        null !== $requirementGroupID && $obj['requirementGroupID'] = $requirementGroupID;

        return $obj;
    }

    public function withAreaCode(string $areaCode): self
    {
        $obj = clone $this;
        $obj['areaCode'] = $areaCode;

        return $obj;
    }

    public function withComments(string $comments): self
    {
        $obj = clone $this;
        $obj['comments'] = $comments;

        return $obj;
    }

    public function withCountryCode(string $countryCode): self
    {
        $obj = clone $this;
        $obj['countryCode'] = $countryCode;

        return $obj;
    }

    public function withCustomerReference(string $customerReference): self
    {
        $obj = clone $this;
        $obj['customerReference'] = $customerReference;

        return $obj;
    }

    /**
     * @param list<Feature|value-of<Feature>> $features
     */
    public function withFeatures(array $features): self
    {
        $obj = clone $this;
        $obj['features'] = $features;

        return $obj;
    }

    /**
     * @param PhoneNumberType|value-of<PhoneNumberType> $phoneNumberType
     */
    public function withPhoneNumberType(
        PhoneNumberType|string $phoneNumberType
    ): self {
        $obj = clone $this;
        $obj['phoneNumberType'] = $phoneNumberType;

        return $obj;
    }

    public function withQuantity(int $quantity): self
    {
        $obj = clone $this;
        $obj['quantity'] = $quantity;

        return $obj;
    }

    /**
     * The ID of the requirement group to associate with this advanced order.
     */
    public function withRequirementGroupID(string $requirementGroupID): self
    {
        $obj = clone $this;
        $obj['requirementGroupID'] = $requirementGroupID;

        return $obj;
    }
}
