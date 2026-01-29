<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PortingOrders\PortingOrderGetRequirementsResponse\FieldType;
use Telnyx\PortingOrders\PortingOrderGetRequirementsResponse\RequirementType;

/**
 * @phpstan-import-type RequirementTypeShape from \Telnyx\PortingOrders\PortingOrderGetRequirementsResponse\RequirementType
 *
 * @phpstan-type PortingOrderGetRequirementsResponseShape = array{
 *   fieldType?: null|FieldType|value-of<FieldType>,
 *   fieldValue?: string|null,
 *   recordType?: string|null,
 *   requirementStatus?: string|null,
 *   requirementType?: null|RequirementType|RequirementTypeShape,
 * }
 */
final class PortingOrderGetRequirementsResponse implements BaseModel
{
    /** @use SdkModel<PortingOrderGetRequirementsResponseShape> */
    use SdkModel;

    /**
     * Type of value expected on field_value field.
     *
     * @var value-of<FieldType>|null $fieldType
     */
    #[Optional('field_type', enum: FieldType::class)]
    public ?string $fieldType;

    /**
     * Identifies the document that satisfies this requirement.
     */
    #[Optional('field_value')]
    public ?string $fieldValue;

    /**
     * Identifies the type of the resource.
     */
    #[Optional('record_type')]
    public ?string $recordType;

    /**
     * Status of the requirement.
     */
    #[Optional('requirement_status')]
    public ?string $requirementStatus;

    /**
     * Identifies the requirement type that meets this requirement.
     */
    #[Optional('requirement_type')]
    public ?RequirementType $requirementType;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param FieldType|value-of<FieldType>|null $fieldType
     * @param RequirementType|RequirementTypeShape|null $requirementType
     */
    public static function with(
        FieldType|string|null $fieldType = null,
        ?string $fieldValue = null,
        ?string $recordType = null,
        ?string $requirementStatus = null,
        RequirementType|array|null $requirementType = null,
    ): self {
        $self = new self;

        null !== $fieldType && $self['fieldType'] = $fieldType;
        null !== $fieldValue && $self['fieldValue'] = $fieldValue;
        null !== $recordType && $self['recordType'] = $recordType;
        null !== $requirementStatus && $self['requirementStatus'] = $requirementStatus;
        null !== $requirementType && $self['requirementType'] = $requirementType;

        return $self;
    }

    /**
     * Type of value expected on field_value field.
     *
     * @param FieldType|value-of<FieldType> $fieldType
     */
    public function withFieldType(FieldType|string $fieldType): self
    {
        $self = clone $this;
        $self['fieldType'] = $fieldType;

        return $self;
    }

    /**
     * Identifies the document that satisfies this requirement.
     */
    public function withFieldValue(string $fieldValue): self
    {
        $self = clone $this;
        $self['fieldValue'] = $fieldValue;

        return $self;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }

    /**
     * Status of the requirement.
     */
    public function withRequirementStatus(string $requirementStatus): self
    {
        $self = clone $this;
        $self['requirementStatus'] = $requirementStatus;

        return $self;
    }

    /**
     * Identifies the requirement type that meets this requirement.
     *
     * @param RequirementType|RequirementTypeShape $requirementType
     */
    public function withRequirementType(
        RequirementType|array $requirementType
    ): self {
        $self = clone $this;
        $self['requirementType'] = $requirementType;

        return $self;
    }
}
