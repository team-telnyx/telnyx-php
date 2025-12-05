<?php

declare(strict_types=1);

namespace Telnyx\RegulatoryRequirements\RegulatoryRequirementGetResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\RegulatoryRequirements\RegulatoryRequirementGetResponse\Data\RegulatoryRequirement;
use Telnyx\RegulatoryRequirements\RegulatoryRequirementGetResponse\Data\RegulatoryRequirement\AcceptanceCriteria;

/**
 * @phpstan-type DataShape = array{
 *   action?: string|null,
 *   country_code?: string|null,
 *   phone_number_type?: string|null,
 *   regulatory_requirements?: list<RegulatoryRequirement>|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Api(optional: true)]
    public ?string $action;

    #[Api(optional: true)]
    public ?string $country_code;

    #[Api(optional: true)]
    public ?string $phone_number_type;

    /** @var list<RegulatoryRequirement>|null $regulatory_requirements */
    #[Api(list: RegulatoryRequirement::class, optional: true)]
    public ?array $regulatory_requirements;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<RegulatoryRequirement|array{
     *   id?: string|null,
     *   acceptance_criteria?: AcceptanceCriteria|null,
     *   description?: string|null,
     *   example?: string|null,
     *   field_type?: string|null,
     *   name?: string|null,
     * }> $regulatory_requirements
     */
    public static function with(
        ?string $action = null,
        ?string $country_code = null,
        ?string $phone_number_type = null,
        ?array $regulatory_requirements = null,
    ): self {
        $obj = new self;

        null !== $action && $obj['action'] = $action;
        null !== $country_code && $obj['country_code'] = $country_code;
        null !== $phone_number_type && $obj['phone_number_type'] = $phone_number_type;
        null !== $regulatory_requirements && $obj['regulatory_requirements'] = $regulatory_requirements;

        return $obj;
    }

    public function withAction(string $action): self
    {
        $obj = clone $this;
        $obj['action'] = $action;

        return $obj;
    }

    public function withCountryCode(string $countryCode): self
    {
        $obj = clone $this;
        $obj['country_code'] = $countryCode;

        return $obj;
    }

    public function withPhoneNumberType(string $phoneNumberType): self
    {
        $obj = clone $this;
        $obj['phone_number_type'] = $phoneNumberType;

        return $obj;
    }

    /**
     * @param list<RegulatoryRequirement|array{
     *   id?: string|null,
     *   acceptance_criteria?: AcceptanceCriteria|null,
     *   description?: string|null,
     *   example?: string|null,
     *   field_type?: string|null,
     *   name?: string|null,
     * }> $regulatoryRequirements
     */
    public function withRegulatoryRequirements(
        array $regulatoryRequirements
    ): self {
        $obj = clone $this;
        $obj['regulatory_requirements'] = $regulatoryRequirements;

        return $obj;
    }
}
