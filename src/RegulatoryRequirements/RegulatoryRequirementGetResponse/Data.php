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
        $self = new self;

        null !== $action && $self['action'] = $action;
        null !== $countryCode && $self['countryCode'] = $countryCode;
        null !== $phoneNumberType && $self['phoneNumberType'] = $phoneNumberType;
        null !== $regulatoryRequirements && $self['regulatoryRequirements'] = $regulatoryRequirements;

        return $self;
    }

    public function withAction(string $action): self
    {
        $self = clone $this;
        $self['action'] = $action;

        return $self;
    }

    public function withCountryCode(string $countryCode): self
    {
        $self = clone $this;
        $self['countryCode'] = $countryCode;

        return $self;
    }

    public function withPhoneNumberType(string $phoneNumberType): self
    {
        $self = clone $this;
        $self['phoneNumberType'] = $phoneNumberType;

        return $self;
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
        $self = clone $this;
        $self['regulatoryRequirements'] = $regulatoryRequirements;

        return $self;
    }
}
