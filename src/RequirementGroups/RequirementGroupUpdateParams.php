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
 * @see Telnyx\RequirementGroupsService::update()
 *
 * @phpstan-type RequirementGroupUpdateParamsShape = array{
 *   customer_reference?: string,
 *   regulatory_requirements?: list<RegulatoryRequirement>,
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
    #[Api(optional: true)]
    public ?string $customer_reference;

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
     * @param list<RegulatoryRequirement> $regulatory_requirements
     */
    public static function with(
        ?string $customer_reference = null,
        ?array $regulatory_requirements = null
    ): self {
        $obj = new self;

        null !== $customer_reference && $obj->customer_reference = $customer_reference;
        null !== $regulatory_requirements && $obj->regulatory_requirements = $regulatory_requirements;

        return $obj;
    }

    /**
     * Reference for the customer.
     */
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
