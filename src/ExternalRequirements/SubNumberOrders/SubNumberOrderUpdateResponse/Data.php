<?php

declare(strict_types=1);

namespace Telnyx\ExternalRequirements\SubNumberOrders\SubNumberOrderUpdateResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\ExternalRequirements\SubNumberOrders\SubNumberOrderUpdateResponse\Data\RequirementAction;

/**
 * @phpstan-import-type RequirementActionShape from \Telnyx\ExternalRequirements\SubNumberOrders\SubNumberOrderUpdateResponse\Data\RequirementAction
 *
 * @phpstan-type DataShape = array{
 *   regulatoryRequirementID?: string|null,
 *   requirementAction?: null|RequirementAction|RequirementActionShape,
 *   subOrderID?: string|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Optional('regulatory_requirement_id')]
    public ?string $regulatoryRequirementID;

    #[Optional('requirement_action')]
    public ?RequirementAction $requirementAction;

    #[Optional('sub_order_id')]
    public ?string $subOrderID;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param RequirementAction|RequirementActionShape|null $requirementAction
     */
    public static function with(
        ?string $regulatoryRequirementID = null,
        RequirementAction|array|null $requirementAction = null,
        ?string $subOrderID = null,
    ): self {
        $self = new self;

        null !== $regulatoryRequirementID && $self['regulatoryRequirementID'] = $regulatoryRequirementID;
        null !== $requirementAction && $self['requirementAction'] = $requirementAction;
        null !== $subOrderID && $self['subOrderID'] = $subOrderID;

        return $self;
    }

    public function withRegulatoryRequirementID(
        string $regulatoryRequirementID
    ): self {
        $self = clone $this;
        $self['regulatoryRequirementID'] = $regulatoryRequirementID;

        return $self;
    }

    /**
     * @param RequirementAction|RequirementActionShape $requirementAction
     */
    public function withRequirementAction(
        RequirementAction|array $requirementAction
    ): self {
        $self = clone $this;
        $self['requirementAction'] = $requirementAction;

        return $self;
    }

    public function withSubOrderID(string $subOrderID): self
    {
        $self = clone $this;
        $self['subOrderID'] = $subOrderID;

        return $self;
    }
}
