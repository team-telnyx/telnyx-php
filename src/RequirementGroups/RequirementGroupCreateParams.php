<?php

declare(strict_types=1);

namespace Telnyx\RequirementGroups;

use Telnyx\Core\Attributes\Api;
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
 *   country_code: string,
 *   phone_number_type: PhoneNumberType|value-of<PhoneNumberType>,
 *   customer_reference?: string,
 *   regulatory_requirements?: list<RegulatoryRequirement>,
 * }
 */
final class RequirementGroupCreateParams implements BaseModel
{
    /** @use SdkModel<RequirementGroupCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var value-of<Action> $action */
    #[Api(enum: Action::class)]
    public string $action;

    /**
     * ISO alpha 2 country code.
     */
    #[Api]
    public string $country_code;

    /** @var value-of<PhoneNumberType> $phone_number_type */
    #[Api(enum: PhoneNumberType::class)]
    public string $phone_number_type;

    #[Api(optional: true)]
    public ?string $customer_reference;

    /** @var list<RegulatoryRequirement>|null $regulatory_requirements */
    #[Api(list: RegulatoryRequirement::class, optional: true)]
    public ?array $regulatory_requirements;

    /**
     * `new RequirementGroupCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * RequirementGroupCreateParams::with(
     *   action: ..., country_code: ..., phone_number_type: ...
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
     * @param PhoneNumberType|value-of<PhoneNumberType> $phone_number_type
     * @param list<RegulatoryRequirement> $regulatory_requirements
     */
    public static function with(
        Action|string $action,
        string $country_code,
        PhoneNumberType|string $phone_number_type,
        ?string $customer_reference = null,
        ?array $regulatory_requirements = null,
    ): self {
        $obj = new self;

        $obj['action'] = $action;
        $obj->country_code = $country_code;
        $obj['phone_number_type'] = $phone_number_type;

        null !== $customer_reference && $obj->customer_reference = $customer_reference;
        null !== $regulatory_requirements && $obj->regulatory_requirements = $regulatory_requirements;

        return $obj;
    }

    /**
     * @param Action|value-of<Action> $action
     */
    public function withAction(Action|string $action): self
    {
        $obj = clone $this;
        $obj['action'] = $action;

        return $obj;
    }

    /**
     * ISO alpha 2 country code.
     */
    public function withCountryCode(string $countryCode): self
    {
        $obj = clone $this;
        $obj->country_code = $countryCode;

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

    public function withCustomerReference(string $customerReference): self
    {
        $obj = clone $this;
        $obj->customer_reference = $customerReference;

        return $obj;
    }

    /**
     * @param list<RegulatoryRequirement> $regulatoryRequirements
     */
    public function withRegulatoryRequirements(
        array $regulatoryRequirements
    ): self {
        $obj = clone $this;
        $obj->regulatory_requirements = $regulatoryRequirements;

        return $obj;
    }
}
