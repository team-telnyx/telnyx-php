<?php

declare(strict_types=1);

namespace Telnyx\RequirementGroups;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\RequirementGroups\RequirementGroupUpdateParams\RegulatoryRequirement;

/**
 * Update requirement values in requirement group.
 *
 * @see Telnyx\RequirementGroups->update
 *
 * @phpstan-type RequirementGroupUpdateParamsShape = array{
 *   customerReference?: string,
 *   regulatoryRequirements?: list<RegulatoryRequirement>,
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
    #[Api('customer_reference', optional: true)]
    public ?string $customerReference;

    /** @var list<RegulatoryRequirement>|null $regulatoryRequirements */
    #[Api(
        'regulatory_requirements',
        list: RegulatoryRequirement::class,
        optional: true,
    )]
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
     * @param list<RegulatoryRequirement> $regulatoryRequirements
     */
    public static function with(
        ?string $customerReference = null,
        ?array $regulatoryRequirements = null
    ): self {
        $obj = new self;

        null !== $customerReference && $obj->customerReference = $customerReference;
        null !== $regulatoryRequirements && $obj->regulatoryRequirements = $regulatoryRequirements;

        return $obj;
    }

    /**
     * Reference for the customer.
     */
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
