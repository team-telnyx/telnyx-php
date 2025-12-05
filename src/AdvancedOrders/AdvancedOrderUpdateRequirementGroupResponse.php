<?php

declare(strict_types=1);

namespace Telnyx\AdvancedOrders;

use Telnyx\AdvancedOrders\AdvancedOrderUpdateRequirementGroupResponse\Feature;
use Telnyx\AdvancedOrders\AdvancedOrderUpdateRequirementGroupResponse\PhoneNumberType;
use Telnyx\AdvancedOrders\AdvancedOrderUpdateRequirementGroupResponse\Status;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type AdvancedOrderUpdateRequirementGroupResponseShape = array{
 *   id?: string|null,
 *   area_code?: string|null,
 *   comments?: string|null,
 *   country_code?: string|null,
 *   customer_reference?: string|null,
 *   features?: list<value-of<Feature>>|null,
 *   orders?: list<string>|null,
 *   phone_number_type?: list<value-of<PhoneNumberType>>|null,
 *   quantity?: int|null,
 *   requirement_group_id?: string|null,
 *   status?: list<value-of<Status>>|null,
 * }
 */
final class AdvancedOrderUpdateRequirementGroupResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<AdvancedOrderUpdateRequirementGroupResponseShape> */
    use SdkModel;

    use SdkResponse;

    #[Api(optional: true)]
    public ?string $id;

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

    /** @var list<string>|null $orders */
    #[Api(list: 'string', optional: true)]
    public ?array $orders;

    /** @var list<value-of<PhoneNumberType>>|null $phone_number_type */
    #[Api(list: PhoneNumberType::class, optional: true)]
    public ?array $phone_number_type;

    #[Api(optional: true)]
    public ?int $quantity;

    /**
     * The ID of the requirement group associated with this advanced order.
     */
    #[Api(optional: true)]
    public ?string $requirement_group_id;

    /** @var list<value-of<Status>>|null $status */
    #[Api(list: Status::class, optional: true)]
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
     * @param list<PhoneNumberType|value-of<PhoneNumberType>> $phone_number_type
     * @param list<Status|value-of<Status>> $status
     */
    public static function with(
        ?string $id = null,
        ?string $area_code = null,
        ?string $comments = null,
        ?string $country_code = null,
        ?string $customer_reference = null,
        ?array $features = null,
        ?array $orders = null,
        ?array $phone_number_type = null,
        ?int $quantity = null,
        ?string $requirement_group_id = null,
        ?array $status = null,
    ): self {
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $area_code && $obj['area_code'] = $area_code;
        null !== $comments && $obj['comments'] = $comments;
        null !== $country_code && $obj['country_code'] = $country_code;
        null !== $customer_reference && $obj['customer_reference'] = $customer_reference;
        null !== $features && $obj['features'] = $features;
        null !== $orders && $obj['orders'] = $orders;
        null !== $phone_number_type && $obj['phone_number_type'] = $phone_number_type;
        null !== $quantity && $obj['quantity'] = $quantity;
        null !== $requirement_group_id && $obj['requirement_group_id'] = $requirement_group_id;
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
        $obj['area_code'] = $areaCode;

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
        $obj['country_code'] = $countryCode;

        return $obj;
    }

    public function withCustomerReference(string $customerReference): self
    {
        $obj = clone $this;
        $obj['customer_reference'] = $customerReference;

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
        $obj['phone_number_type'] = $phoneNumberType;

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
        $obj['requirement_group_id'] = $requirementGroupID;

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
