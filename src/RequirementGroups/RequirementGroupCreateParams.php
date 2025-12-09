<?php

declare(strict_types=1);

namespace Telnyx\RequirementGroups;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\RequirementGroups\RequirementGroupCreateParams\Action;
use Telnyx\RequirementGroups\RequirementGroupCreateParams\PhoneNumberType;
use Telnyx\RequirementGroups\RequirementGroupCreateParams\RegulatoryRequirement;

/**
 * Create a new requirement group.
 *
 * @see Telnyx\Services\RequirementGroupsService::create()
 *
 * @phpstan-type RequirementGroupCreateParamsShape = array{
 *   action: Action|value-of<Action>,
 *   countryCode: string,
 *   phoneNumberType: PhoneNumberType|value-of<PhoneNumberType>,
 *   customerReference?: string,
 *   regulatoryRequirements?: list<RegulatoryRequirement|array{
 *     fieldValue?: string|null, requirementID?: string|null
 *   }>,
 * }
 */
final class RequirementGroupCreateParams implements BaseModel
{
    /** @use SdkModel<RequirementGroupCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var value-of<Action> $action */
    #[Required(enum: Action::class)]
    public string $action;

    /**
     * ISO alpha 2 country code.
     */
    #[Required('country_code')]
    public string $countryCode;

    /** @var value-of<PhoneNumberType> $phoneNumberType */
    #[Required('phone_number_type', enum: PhoneNumberType::class)]
    public string $phoneNumberType;

    #[Optional('customer_reference')]
    public ?string $customerReference;

    /** @var list<RegulatoryRequirement>|null $regulatoryRequirements */
    #[Optional('regulatory_requirements', list: RegulatoryRequirement::class)]
    public ?array $regulatoryRequirements;

    /**
     * `new RequirementGroupCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * RequirementGroupCreateParams::with(
     *   action: ..., countryCode: ..., phoneNumberType: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new RequirementGroupCreateParams)
     *   ->withAction(...)
     *   ->withCountryCode(...)
     *   ->withPhoneNumberType(...)
     * ```
     */
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
     * @param list<RegulatoryRequirement|array{
     *   fieldValue?: string|null, requirementID?: string|null
     * }> $regulatoryRequirements
     */
    public static function with(
        Action|string $action,
        string $countryCode,
        PhoneNumberType|string $phoneNumberType,
        ?string $customerReference = null,
        ?array $regulatoryRequirements = null,
    ): self {
        $self = new self;

        $self['action'] = $action;
        $self['countryCode'] = $countryCode;
        $self['phoneNumberType'] = $phoneNumberType;

        null !== $customerReference && $self['customerReference'] = $customerReference;
        null !== $regulatoryRequirements && $self['regulatoryRequirements'] = $regulatoryRequirements;

        return $self;
    }

    /**
     * @param Action|value-of<Action> $action
     */
    public function withAction(Action|string $action): self
    {
        $self = clone $this;
        $self['action'] = $action;

        return $self;
    }

    /**
     * ISO alpha 2 country code.
     */
    public function withCountryCode(string $countryCode): self
    {
        $self = clone $this;
        $self['countryCode'] = $countryCode;

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

    public function withCustomerReference(string $customerReference): self
    {
        $self = clone $this;
        $self['customerReference'] = $customerReference;

        return $self;
    }

    /**
     * @param list<RegulatoryRequirement|array{
     *   fieldValue?: string|null, requirementID?: string|null
     * }> $regulatoryRequirements
     */
    public function withRegulatoryRequirements(
        array $regulatoryRequirements
    ): self {
        $self = clone $this;
        $self['regulatoryRequirements'] = $regulatoryRequirements;

        return $self;
    }
}
