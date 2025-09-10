<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\PortingOrderGetRequirementsResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PortingOrders\PortingOrderGetRequirementsResponse\Data\FieldType;
use Telnyx\PortingOrders\PortingOrderGetRequirementsResponse\Data\RequirementType;

/**
 * @phpstan-type data_alias = array{
 *   fieldType?: value-of<FieldType>|null,
 *   fieldValue?: string|null,
 *   recordType?: string|null,
 *   requirementStatus?: string|null,
 *   requirementType?: RequirementType|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<data_alias> */
    use SdkModel;

    /**
     * Type of value expected on field_value field.
     *
     * @var value-of<FieldType>|null $fieldType
     */
    #[Api('field_type', enum: FieldType::class, optional: true)]
    public ?string $fieldType;

    /**
     * Identifies the document that satisfies this requirement.
     */
    #[Api('field_value', optional: true)]
    public ?string $fieldValue;

    /**
     * Identifies the type of the resource.
     */
    #[Api('record_type', optional: true)]
    public ?string $recordType;

    /**
     * Status of the requirement.
     */
    #[Api('requirement_status', optional: true)]
    public ?string $requirementStatus;

    /**
     * Identifies the requirement type that meets this requirement.
     */
    #[Api('requirement_type', optional: true)]
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
     * @param FieldType|value-of<FieldType> $fieldType
     */
    public static function with(
        FieldType|string|null $fieldType = null,
        ?string $fieldValue = null,
        ?string $recordType = null,
        ?string $requirementStatus = null,
        ?RequirementType $requirementType = null,
    ): self {
        $obj = new self;

        null !== $fieldType && $obj->fieldType = $fieldType instanceof FieldType ? $fieldType->value : $fieldType;
        null !== $fieldValue && $obj->fieldValue = $fieldValue;
        null !== $recordType && $obj->recordType = $recordType;
        null !== $requirementStatus && $obj->requirementStatus = $requirementStatus;
        null !== $requirementType && $obj->requirementType = $requirementType;

        return $obj;
    }

    /**
     * Type of value expected on field_value field.
     *
     * @param FieldType|value-of<FieldType> $fieldType
     */
    public function withFieldType(FieldType|string $fieldType): self
    {
        $obj = clone $this;
        $obj->fieldType = $fieldType instanceof FieldType ? $fieldType->value : $fieldType;

        return $obj;
    }

    /**
     * Identifies the document that satisfies this requirement.
     */
    public function withFieldValue(string $fieldValue): self
    {
        $obj = clone $this;
        $obj->fieldValue = $fieldValue;

        return $obj;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj->recordType = $recordType;

        return $obj;
    }

    /**
     * Status of the requirement.
     */
    public function withRequirementStatus(string $requirementStatus): self
    {
        $obj = clone $this;
        $obj->requirementStatus = $requirementStatus;

        return $obj;
    }

    /**
     * Identifies the requirement type that meets this requirement.
     */
    public function withRequirementType(RequirementType $requirementType): self
    {
        $obj = clone $this;
        $obj->requirementType = $requirementType;

        return $obj;
    }
}
