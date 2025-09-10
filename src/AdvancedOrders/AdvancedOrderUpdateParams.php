<?php

declare(strict_types=1);

namespace Telnyx\AdvancedOrders;

use Telnyx\AdvancedOrders\AdvancedOrderUpdateParams\Feature;
use Telnyx\AdvancedOrders\AdvancedOrderUpdateParams\PhoneNumberType;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new AdvancedOrderUpdateParams); // set properties as needed
 * $client->advancedOrders->update(...$params->toArray());
 * ```
 * Update Advanced Order.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->advancedOrders->update(...$params->toArray());`
 *
 * @see Telnyx\AdvancedOrders->update
 *
 * @phpstan-type advanced_order_update_params = array{
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
final class AdvancedOrderUpdateParams implements BaseModel
{
    /** @use SdkModel<advanced_order_update_params> */
    use SdkModel;
    use SdkParams;

    #[Api('area_code', optional: true)]
    public ?string $areaCode;

    #[Api(optional: true)]
    public ?string $comments;

    #[Api('country_code', optional: true)]
    public ?string $countryCode;

    #[Api('customer_reference', optional: true)]
    public ?string $customerReference;

    /** @var list<value-of<Feature>>|null $features */
    #[Api(list: Feature::class, optional: true)]
    public ?array $features;

    /** @var value-of<PhoneNumberType>|null $phoneNumberType */
    #[Api('phone_number_type', enum: PhoneNumberType::class, optional: true)]
    public ?string $phoneNumberType;

    #[Api(optional: true)]
    public ?int $quantity;

    /**
     * The ID of the requirement group to associate with this advanced order.
     */
    #[Api('requirement_group_id', optional: true)]
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

        null !== $areaCode && $obj->areaCode = $areaCode;
        null !== $comments && $obj->comments = $comments;
        null !== $countryCode && $obj->countryCode = $countryCode;
        null !== $customerReference && $obj->customerReference = $customerReference;
        null !== $features && $obj->features = array_map(fn ($v) => $v instanceof Feature ? $v->value : $v, $features);
        null !== $phoneNumberType && $obj->phoneNumberType = $phoneNumberType instanceof PhoneNumberType ? $phoneNumberType->value : $phoneNumberType;
        null !== $quantity && $obj->quantity = $quantity;
        null !== $requirementGroupID && $obj->requirementGroupID = $requirementGroupID;

        return $obj;
    }

    public function withAreaCode(string $areaCode): self
    {
        $obj = clone $this;
        $obj->areaCode = $areaCode;

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
        $obj->countryCode = $countryCode;

        return $obj;
    }

    public function withCustomerReference(string $customerReference): self
    {
        $obj = clone $this;
        $obj->customerReference = $customerReference;

        return $obj;
    }

    /**
     * @param list<Feature|value-of<Feature>> $features
     */
    public function withFeatures(array $features): self
    {
        $obj = clone $this;
        $obj->features = array_map(fn ($v) => $v instanceof Feature ? $v->value : $v, $features);

        return $obj;
    }

    /**
     * @param PhoneNumberType|value-of<PhoneNumberType> $phoneNumberType
     */
    public function withPhoneNumberType(
        PhoneNumberType|string $phoneNumberType
    ): self {
        $obj = clone $this;
        $obj->phoneNumberType = $phoneNumberType instanceof PhoneNumberType ? $phoneNumberType->value : $phoneNumberType;

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
        $obj->requirementGroupID = $requirementGroupID;

        return $obj;
    }
}
