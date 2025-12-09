<?php

declare(strict_types=1);

namespace Telnyx\AdvancedOrders;

use Telnyx\AdvancedOrders\AdvancedOrderNewResponse\Feature;
use Telnyx\AdvancedOrders\AdvancedOrderNewResponse\PhoneNumberType;
use Telnyx\AdvancedOrders\AdvancedOrderNewResponse\Status;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type AdvancedOrderNewResponseShape = array{
 *   id?: string|null,
 *   areaCode?: string|null,
 *   comments?: string|null,
 *   countryCode?: string|null,
 *   customerReference?: string|null,
 *   features?: list<value-of<Feature>>|null,
 *   orders?: list<string>|null,
 *   phoneNumberType?: list<value-of<PhoneNumberType>>|null,
 *   quantity?: int|null,
 *   requirementGroupID?: string|null,
 *   status?: list<value-of<Status>>|null,
 * }
 */
final class AdvancedOrderNewResponse implements BaseModel
{
    /** @use SdkModel<AdvancedOrderNewResponseShape> */
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
     * @param list<Feature|value-of<Feature>> $features
     * @param list<string> $orders
     * @param list<PhoneNumberType|value-of<PhoneNumberType>> $phoneNumberType
     * @param list<Status|value-of<Status>> $status
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
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $areaCode && $obj['areaCode'] = $areaCode;
        null !== $comments && $obj['comments'] = $comments;
        null !== $countryCode && $obj['countryCode'] = $countryCode;
        null !== $customerReference && $obj['customerReference'] = $customerReference;
        null !== $features && $obj['features'] = $features;
        null !== $orders && $obj['orders'] = $orders;
        null !== $phoneNumberType && $obj['phoneNumberType'] = $phoneNumberType;
        null !== $quantity && $obj['quantity'] = $quantity;
        null !== $requirementGroupID && $obj['requirementGroupID'] = $requirementGroupID;
        null !== $status && $obj['status'] = $status;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

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
     * @param list<string> $orders
     */
    public function withOrders(array $orders): self
    {
        $obj = clone $this;
        $obj['orders'] = $orders;

        return $obj;
    }

    /**
     * @param list<PhoneNumberType|value-of<PhoneNumberType>> $phoneNumberType
     */
    public function withPhoneNumberType(array $phoneNumberType): self
    {
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
     * The ID of the requirement group associated with this advanced order.
     */
    public function withRequirementGroupID(string $requirementGroupID): self
    {
        $obj = clone $this;
        $obj['requirementGroupID'] = $requirementGroupID;

        return $obj;
    }

    /**
     * @param list<Status|value-of<Status>> $status
     */
    public function withStatus(array $status): self
    {
        $obj = clone $this;
        $obj['status'] = $status;

        return $obj;
    }
}
