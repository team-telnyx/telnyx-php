<?php

declare(strict_types=1);

namespace Telnyx\AdvancedOrders;

use Telnyx\AdvancedOrders\AdvancedOrderCreateParams\Feature;
use Telnyx\AdvancedOrders\AdvancedOrderCreateParams\PhoneNumberType;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Create Advanced Order.
 *
 * @see Telnyx\Services\AdvancedOrdersService::create()
 *
 * @phpstan-type AdvancedOrderCreateParamsShape = array{
 *   area_code?: string,
 *   comments?: string,
 *   country_code?: string,
 *   customer_reference?: string,
 *   features?: list<Feature|value-of<Feature>>,
 *   phone_number_type?: PhoneNumberType|value-of<PhoneNumberType>,
 *   quantity?: int,
 *   requirement_group_id?: string,
 * }
 */
final class AdvancedOrderCreateParams implements BaseModel
{
    /** @use SdkModel<AdvancedOrderCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api(optional: true)]
    public ?string $area_code;

    #[Api(optional: true)]
    public ?string $comments;

    #[Api(optional: true)]
    public ?string $country_code;

    #[Api(optional: true)]
    public ?string $customer_reference;

    /** @var list<value-of<Feature>>|null $features */
    #[Api(list: Feature::class, optional: true)]
    public ?array $features;

    /** @var value-of<PhoneNumberType>|null $phone_number_type */
    #[Api(enum: PhoneNumberType::class, optional: true)]
    public ?string $phone_number_type;

    #[Api(optional: true)]
    public ?int $quantity;

    /**
     * The ID of the requirement group to associate with this advanced order.
     */
    #[Api(optional: true)]
    public ?string $requirement_group_id;

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
     * @param PhoneNumberType|value-of<PhoneNumberType> $phone_number_type
     */
    public static function with(
        ?string $area_code = null,
        ?string $comments = null,
        ?string $country_code = null,
        ?string $customer_reference = null,
        ?array $features = null,
        PhoneNumberType|string|null $phone_number_type = null,
        ?int $quantity = null,
        ?string $requirement_group_id = null,
    ): self {
        $obj = new self;

        null !== $area_code && $obj->area_code = $area_code;
        null !== $comments && $obj->comments = $comments;
        null !== $country_code && $obj->country_code = $country_code;
        null !== $customer_reference && $obj->customer_reference = $customer_reference;
        null !== $features && $obj['features'] = $features;
        null !== $phone_number_type && $obj['phone_number_type'] = $phone_number_type;
        null !== $quantity && $obj->quantity = $quantity;
        null !== $requirement_group_id && $obj->requirement_group_id = $requirement_group_id;

        return $obj;
    }

    public function withAreaCode(string $areaCode): self
    {
        $obj = clone $this;
        $obj->area_code = $areaCode;

        return $obj;
    }

    public function withComments(string $comments): self
    {
        $obj = clone $this;
        $obj->comments = $comments;

        return $obj;
    }

    public function withCountryCode(string $countryCode): self
    {
        $obj = clone $this;
        $obj->country_code = $countryCode;

        return $obj;
    }

    public function withCustomerReference(string $customerReference): self
    {
        $obj = clone $this;
        $obj->customer_reference = $customerReference;

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
        $obj['phone_number_type'] = $phoneNumberType;

        return $obj;
    }

    public function withQuantity(int $quantity): self
    {
        $obj = clone $this;
        $obj->quantity = $quantity;

        return $obj;
    }

    /**
     * The ID of the requirement group to associate with this advanced order.
     */
    public function withRequirementGroupID(string $requirementGroupID): self
    {
        $obj = clone $this;
        $obj->requirement_group_id = $requirementGroupID;

        return $obj;
    }
}
