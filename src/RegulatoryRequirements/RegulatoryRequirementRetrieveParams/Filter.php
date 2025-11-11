<?php

declare(strict_types=1);

namespace Telnyx\RegulatoryRequirements\RegulatoryRequirementRetrieveParams;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\RegulatoryRequirements\RegulatoryRequirementRetrieveParams\Filter\Action;
use Telnyx\RegulatoryRequirements\RegulatoryRequirementRetrieveParams\Filter\PhoneNumberType;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[phone_number], filter[requirement_group_id], filter[country_code], filter[phone_number_type], filter[action].
 *
 * @phpstan-type FilterShape = array{
 *   action?: value-of<Action>|null,
 *   country_code?: string|null,
 *   phone_number?: string|null,
 *   phone_number_type?: value-of<PhoneNumberType>|null,
 *   requirement_group_id?: string|null,
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    /**
     * Action to check requirements for.
     *
     * @var value-of<Action>|null $action
     */
    #[Api(enum: Action::class, optional: true)]
    public ?string $action;

    /**
     * Country code(iso2) to check requirements for.
     */
    #[Api(optional: true)]
    public ?string $country_code;

    /**
     * Phone number to check requirements for.
     */
    #[Api(optional: true)]
    public ?string $phone_number;

    /**
     * Phone number type to check requirements for.
     *
     * @var value-of<PhoneNumberType>|null $phone_number_type
     */
    #[Api(enum: PhoneNumberType::class, optional: true)]
    public ?string $phone_number_type;

    /**
     * ID of requirement group to check requirements for.
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
     * @param Action|value-of<Action> $action
     * @param PhoneNumberType|value-of<PhoneNumberType> $phone_number_type
     */
    public static function with(
        Action|string|null $action = null,
        ?string $country_code = null,
        ?string $phone_number = null,
        PhoneNumberType|string|null $phone_number_type = null,
        ?string $requirement_group_id = null,
    ): self {
        $obj = new self;

        null !== $action && $obj['action'] = $action;
        null !== $country_code && $obj->country_code = $country_code;
        null !== $phone_number && $obj->phone_number = $phone_number;
        null !== $phone_number_type && $obj['phone_number_type'] = $phone_number_type;
        null !== $requirement_group_id && $obj->requirement_group_id = $requirement_group_id;

        return $obj;
    }

    /**
     * Action to check requirements for.
     *
     * @param Action|value-of<Action> $action
     */
    public function withAction(Action|string $action): self
    {
        $obj = clone $this;
        $obj['action'] = $action;

        return $obj;
    }

    /**
     * Country code(iso2) to check requirements for.
     */
    public function withCountryCode(string $countryCode): self
    {
        $obj = clone $this;
        $obj->country_code = $countryCode;

        return $obj;
    }

    /**
     * Phone number to check requirements for.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $obj = clone $this;
        $obj->phone_number = $phoneNumber;

        return $obj;
    }

    /**
     * Phone number type to check requirements for.
     *
     * @param PhoneNumberType|value-of<PhoneNumberType> $phoneNumberType
     */
    public function withPhoneNumberType(
        PhoneNumberType|string $phoneNumberType
    ): self {
        $obj = clone $this;
        $obj['phone_number_type'] = $phoneNumberType;

        return $obj;
    }

    /**
     * ID of requirement group to check requirements for.
     */
    public function withRequirementGroupID(string $requirementGroupID): self
    {
        $obj = clone $this;
        $obj->requirement_group_id = $requirementGroupID;

        return $obj;
    }
}
