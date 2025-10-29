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
 * @see Telnyx\RequirementGroups->create
 *
 * @phpstan-type RequirementGroupCreateParamsShape = array{
 *   action: Action|value-of<Action>,
 *   countryCode: string,
 *   phoneNumberType: PhoneNumberType|value-of<PhoneNumberType>,
 *   customerReference?: string,
 *   regulatoryRequirements?: list<RegulatoryRequirement>,
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
    #[Api('country_code')]
    public string $countryCode;

    /** @var value-of<PhoneNumberType> $phoneNumberType */
    #[Api('phone_number_type', enum: PhoneNumberType::class)]
    public string $phoneNumberType;

    #[Api('customer_reference', optional: true)]
    public ?string $customerReference;

    /** @var list<RegulatoryRequirement>|null $regulatoryRequirements */
    #[Api(
        'regulatory_requirements',
        list: RegulatoryRequirement::class,
        optional: true,
    )]
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
     * @param list<RegulatoryRequirement> $regulatoryRequirements
     */
    public static function with(
        Action|string $action,
        string $countryCode,
        PhoneNumberType|string $phoneNumberType,
        ?string $customerReference = null,
        ?array $regulatoryRequirements = null,
    ): self {
        $obj = new self;

        $obj['action'] = $action;
        $obj->countryCode = $countryCode;
        $obj['phoneNumberType'] = $phoneNumberType;

        null !== $customerReference && $obj->customerReference = $customerReference;
        null !== $regulatoryRequirements && $obj->regulatoryRequirements = $regulatoryRequirements;

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
        $obj->countryCode = $countryCode;

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

    public function withCustomerReference(string $customerReference): self
    {
        $obj = clone $this;
        $obj->customerReference = $customerReference;

        return $obj;
    }

    /**
     * @param list<RegulatoryRequirement> $regulatoryRequirements
     */
    public function withRegulatoryRequirements(
        array $regulatoryRequirements
    ): self {
        $obj = clone $this;
        $obj->regulatoryRequirements = $regulatoryRequirements;

        return $obj;
    }
}
