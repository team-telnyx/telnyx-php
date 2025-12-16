<?php

declare(strict_types=1);

namespace Telnyx\RegulatoryRequirements\RegulatoryRequirementRetrieveParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\RegulatoryRequirements\RegulatoryRequirementRetrieveParams\Filter\Action;
use Telnyx\RegulatoryRequirements\RegulatoryRequirementRetrieveParams\Filter\PhoneNumberType;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[phone_number], filter[requirement_group_id], filter[country_code], filter[phone_number_type], filter[action].
 *
 * @phpstan-type FilterShape = array{
 *   action?: null|Action|value-of<Action>,
 *   countryCode?: string|null,
 *   phoneNumber?: string|null,
 *   phoneNumberType?: null|PhoneNumberType|value-of<PhoneNumberType>,
 *   requirementGroupID?: string|null,
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
    #[Optional(enum: Action::class)]
    public ?string $action;

    /**
     * Country code(iso2) to check requirements for.
     */
    #[Optional('country_code')]
    public ?string $countryCode;

    /**
     * Phone number to check requirements for.
     */
    #[Optional('phone_number')]
    public ?string $phoneNumber;

    /**
     * Phone number type to check requirements for.
     *
     * @var value-of<PhoneNumberType>|null $phoneNumberType
     */
    #[Optional('phone_number_type', enum: PhoneNumberType::class)]
    public ?string $phoneNumberType;

    /**
     * ID of requirement group to check requirements for.
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
        $self = new self;

        null !== $action && $self['action'] = $action;
        null !== $countryCode && $self['countryCode'] = $countryCode;
        null !== $phoneNumber && $self['phoneNumber'] = $phoneNumber;
        null !== $phoneNumberType && $self['phoneNumberType'] = $phoneNumberType;
        null !== $requirementGroupID && $self['requirementGroupID'] = $requirementGroupID;

        return $self;
    }

    /**
     * Action to check requirements for.
     *
     * @param Action|value-of<Action> $action
     */
    public function withAction(Action|string $action): self
    {
        $self = clone $this;
        $self['action'] = $action;

        return $self;
    }

    /**
     * Country code(iso2) to check requirements for.
     */
    public function withCountryCode(string $countryCode): self
    {
        $self = clone $this;
        $self['countryCode'] = $countryCode;

        return $self;
    }

    /**
     * Phone number to check requirements for.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $self = clone $this;
        $self['phoneNumber'] = $phoneNumber;

        return $self;
    }

    /**
     * Phone number type to check requirements for.
     *
     * @param PhoneNumberType|value-of<PhoneNumberType> $phoneNumberType
     */
    public function withPhoneNumberType(
        PhoneNumberType|string $phoneNumberType
    ): self {
        $self = clone $this;
        $self['phoneNumberType'] = $phoneNumberType;

        return $self;
    }

    /**
     * ID of requirement group to check requirements for.
     */
    public function withRequirementGroupID(string $requirementGroupID): self
    {
        $self = clone $this;
        $self['requirementGroupID'] = $requirementGroupID;

        return $self;
    }
}
