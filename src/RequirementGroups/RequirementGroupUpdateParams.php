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
 * @phpstan-type RequirementGroupUpdateParamsShape = array{
 *   customerReference?: string,
 *   regulatoryRequirements?: list<RegulatoryRequirement|array{
 *     fieldValue?: string|null, requirementID?: string|null
 *   }>,
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
     * @param list<RegulatoryRequirement|array{
     *   fieldValue?: string|null, requirementID?: string|null
     * }> $regulatoryRequirements
     */
    public static function with(
        ?string $customerReference = null,
        ?array $regulatoryRequirements = null
    ): self {
        $obj = new self;

        null !== $customerReference && $obj['customerReference'] = $customerReference;
        null !== $regulatoryRequirements && $obj['regulatoryRequirements'] = $regulatoryRequirements;

        return $obj;
    }

    /**
     * Reference for the customer.
     */
    public function withCustomerReference(string $customerReference): self
    {
        $obj = clone $this;
        $obj['customerReference'] = $customerReference;

        return $obj;
    }

    /**
     * @param list<RegulatoryRequirement|array{
     *   fieldValue?: string|null, requirementID?: string|null
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
