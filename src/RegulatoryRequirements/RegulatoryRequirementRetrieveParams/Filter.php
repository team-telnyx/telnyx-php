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
 * @phpstan-type filter_alias = array{
 *   action?: value-of<Action>,
 *   countryCode?: string,
 *   phoneNumber?: string,
 *   phoneNumberType?: value-of<PhoneNumberType>,
 *   requirementGroupID?: string,
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<filter_alias> */
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
    #[Api('country_code', optional: true)]
    public ?string $countryCode;

    /**
     * Phone number to check requirements for.
     */
    #[Api('phone_number', optional: true)]
    public ?string $phoneNumber;

    /**
     * Phone number type to check requirements for.
     *
     * @var value-of<PhoneNumberType>|null $phoneNumberType
     */
    #[Api('phone_number_type', enum: PhoneNumberType::class, optional: true)]
    public ?string $phoneNumberType;

    /**
     * ID of requirement group to check requirements for.
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
     * @param Action|value-of<Action> $action
     * @param PhoneNumberType|value-of<PhoneNumberType> $phoneNumberType
     */
    public static function with(
        Action|string|null $action = null,
        ?string $countryCode = null,
        ?string $phoneNumber = null,
        PhoneNumberType|string|null $phoneNumberType = null,
        ?string $requirementGroupID = null,
    ): self {
        $obj = new self;

        null !== $action && $obj->action = $action instanceof Action ? $action->value : $action;
        null !== $countryCode && $obj->countryCode = $countryCode;
        null !== $phoneNumber && $obj->phoneNumber = $phoneNumber;
        null !== $phoneNumberType && $obj->phoneNumberType = $phoneNumberType instanceof PhoneNumberType ? $phoneNumberType->value : $phoneNumberType;
        null !== $requirementGroupID && $obj->requirementGroupID = $requirementGroupID;

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
        $obj->action = $action instanceof Action ? $action->value : $action;

        return $obj;
    }

    /**
     * Country code(iso2) to check requirements for.
     */
    public function withCountryCode(string $countryCode): self
    {
        $obj = clone $this;
        $obj->countryCode = $countryCode;

        return $obj;
    }

    /**
     * Phone number to check requirements for.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $obj = clone $this;
        $obj->phoneNumber = $phoneNumber;

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
        $obj->phoneNumberType = $phoneNumberType instanceof PhoneNumberType ? $phoneNumberType->value : $phoneNumberType;

        return $obj;
    }

    /**
     * ID of requirement group to check requirements for.
     */
    public function withRequirementGroupID(string $requirementGroupID): self
    {
        $obj = clone $this;
        $obj->requirementGroupID = $requirementGroupID;

        return $obj;
    }
}
