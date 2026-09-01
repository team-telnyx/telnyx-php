<?php

declare(strict_types=1);

namespace Telnyx\ExternalRequirements\SubNumberOrders\SubNumberOrderGetResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\ExternalRequirements\SubNumberOrders\SubNumberOrderGetResponse\Data\FieldsRequired;
use Telnyx\ExternalRequirements\SubNumberOrders\SubNumberOrderGetResponse\Data\RequirementAction;

/**
 * @phpstan-import-type FieldsRequiredShape from \Telnyx\ExternalRequirements\SubNumberOrders\SubNumberOrderGetResponse\Data\FieldsRequired
 * @phpstan-import-type RequirementActionShape from \Telnyx\ExternalRequirements\SubNumberOrders\SubNumberOrderGetResponse\Data\RequirementAction
 *
 * @phpstan-type DataShape = array{
 *   fieldsRequired?: list<FieldsRequired|FieldsRequiredShape>|null,
 *   regulatoryRequirementID?: string|null,
 *   requirementAction?: null|RequirementAction|RequirementActionShape,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * The fields the end user must provide to fulfill this requirement.
     *
     * @var list<FieldsRequired>|null $fieldsRequired
     */
    #[Optional('fields_required', list: FieldsRequired::class)]
    public ?array $fieldsRequired;

    #[Optional('regulatory_requirement_id')]
    public ?string $regulatoryRequirementID;

    #[Optional('requirement_action')]
    public ?RequirementAction $requirementAction;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<FieldsRequired|FieldsRequiredShape>|null $fieldsRequired
     * @param RequirementAction|RequirementActionShape|null $requirementAction
     */
    public static function with(
        ?array $fieldsRequired = null,
        ?string $regulatoryRequirementID = null,
        RequirementAction|array|null $requirementAction = null,
    ): self {
        $self = new self;

        null !== $fieldsRequired && $self['fieldsRequired'] = $fieldsRequired;
        null !== $regulatoryRequirementID && $self['regulatoryRequirementID'] = $regulatoryRequirementID;
        null !== $requirementAction && $self['requirementAction'] = $requirementAction;

        return $self;
    }

    /**
     * The fields the end user must provide to fulfill this requirement.
     *
     * @param list<FieldsRequired|FieldsRequiredShape> $fieldsRequired
     */
    public function withFieldsRequired(array $fieldsRequired): self
    {
        $self = clone $this;
        $self['fieldsRequired'] = $fieldsRequired;

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
}
