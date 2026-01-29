<?php

declare(strict_types=1);

namespace Telnyx\RequirementGroups;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\RequirementGroups\RequirementGroupUpdateParams\RegulatoryRequirement;

/**
 * Update requirement values in requirement group.
 *
 * @see Telnyx\Services\RequirementGroupsService::update()
 *
 * @phpstan-import-type RegulatoryRequirementShape from \Telnyx\RequirementGroups\RequirementGroupUpdateParams\RegulatoryRequirement
 *
 * @phpstan-type RequirementGroupUpdateParamsShape = array{
 *   customerReference?: string|null,
 *   regulatoryRequirements?: list<RegulatoryRequirement|RegulatoryRequirementShape>|null,
 * }
 */
final class RequirementGroupUpdateParams implements BaseModel
{
    /** @use SdkModel<RequirementGroupUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Reference for the customer.
     */
    #[Optional('customer_reference')]
    public ?string $customerReference;

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
     * @param list<RegulatoryRequirement|RegulatoryRequirementShape>|null $regulatoryRequirements
     */
    public static function with(
        ?string $customerReference = null,
        ?array $regulatoryRequirements = null
    ): self {
        $self = new self;

        null !== $customerReference && $self['customerReference'] = $customerReference;
        null !== $regulatoryRequirements && $self['regulatoryRequirements'] = $regulatoryRequirements;

        return $self;
    }

    /**
     * Reference for the customer.
     */
    public function withCustomerReference(string $customerReference): self
    {
        $self = clone $this;
        $self['customerReference'] = $customerReference;

        return $self;
    }

    /**
     * @param list<RegulatoryRequirement|RegulatoryRequirementShape> $regulatoryRequirements
     */
    public function withRegulatoryRequirements(
        array $regulatoryRequirements
    ): self {
        $self = clone $this;
        $self['regulatoryRequirements'] = $regulatoryRequirements;

        return $self;
    }
}
