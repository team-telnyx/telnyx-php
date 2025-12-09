<?php

declare(strict_types=1);

namespace Telnyx\RegulatoryRequirements\RegulatoryRequirementGetResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\RegulatoryRequirements\RegulatoryRequirementGetResponse\Data\RegulatoryRequirement;
use Telnyx\RegulatoryRequirements\RegulatoryRequirementGetResponse\Data\RegulatoryRequirement\AcceptanceCriteria;

/**
 * @phpstan-type DataShape = array{
 *   action?: string|null,
 *   countryCode?: string|null,
 *   phoneNumberType?: string|null,
 *   regulatoryRequirements?: list<RegulatoryRequirement>|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Optional]
    public ?string $action;

    #[Optional('country_code')]
    public ?string $countryCode;

    #[Optional('phone_number_type')]
    public ?string $phoneNumberType;

    /** @var list<RegulatoryRequirement>|null $regulatoryRequirements */
    #[Optional('regulatory_requirements', list: RegulatoryRequirement::class)]
    public ?array $regulatoryRequirements;

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
     *   acceptanceCriteria?: AcceptanceCriteria|null,
     *   description?: string|null,
     *   example?: string|null,
     *   fieldType?: string|null,
     *   name?: string|null,
     * }> $regulatoryRequirements
     */
    public static function with(
        ?string $action = null,
        ?string $countryCode = null,
        ?string $phoneNumberType = null,
        ?array $regulatoryRequirements = null,
    ): self {
        $obj = new self;

        null !== $action && $obj['action'] = $action;
        null !== $countryCode && $obj['countryCode'] = $countryCode;
        null !== $phoneNumberType && $obj['phoneNumberType'] = $phoneNumberType;
        null !== $regulatoryRequirements && $obj['regulatoryRequirements'] = $regulatoryRequirements;

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
        $obj['countryCode'] = $countryCode;

        return $obj;
    }

    public function withPhoneNumberType(string $phoneNumberType): self
    {
        $obj = clone $this;
        $obj['phoneNumberType'] = $phoneNumberType;

        return $obj;
    }

    /**
     * @param list<RegulatoryRequirement|array{
     *   id?: string|null,
     *   acceptanceCriteria?: AcceptanceCriteria|null,
     *   description?: string|null,
     *   example?: string|null,
     *   fieldType?: string|null,
     *   name?: string|null,
     * }> $regulatoryRequirements
     */
    public function withRegulatoryRequirements(
        array $regulatoryRequirements
    ): self {
        $obj = clone $this;
        $obj['regulatoryRequirements'] = $regulatoryRequirements;

        return $obj;
    }
}
