<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PortingOrders\PortingOrderRequirement\FieldType;

/**
 * @phpstan-type PortingOrderRequirementShape = array{
 *   fieldType?: value-of<FieldType>|null,
 *   fieldValue?: string|null,
 *   recordType?: string|null,
 *   requirementTypeID?: string|null,
 * }
 */
final class PortingOrderRequirement implements BaseModel
{
    /** @use SdkModel<PortingOrderRequirementShape> */
    use SdkModel;

    /**
     * Type of value expected on field_value field.
     *
     * @var value-of<FieldType>|null $fieldType
     */
    #[Optional('field_type', enum: FieldType::class)]
    public ?string $fieldType;

    /**
     * identifies the document that satisfies this requirement.
     */
    #[Optional('field_value')]
    public ?string $fieldValue;

    /**
     * Identifies the type of the resource.
     */
    #[Optional('record_type')]
    public ?string $recordType;

    /**
     * Identifies the requirement type that meets this requirement.
     */
    #[Optional('requirement_type_id')]
    public ?string $requirementTypeID;

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
        ?string $requirementTypeID = null,
    ): self {
        $obj = new self;

        null !== $fieldType && $obj['fieldType'] = $fieldType;
        null !== $fieldValue && $obj['fieldValue'] = $fieldValue;
        null !== $recordType && $obj['recordType'] = $recordType;
        null !== $requirementTypeID && $obj['requirementTypeID'] = $requirementTypeID;

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
        $obj['fieldType'] = $fieldType;

        return $obj;
    }

    /**
     * identifies the document that satisfies this requirement.
     */
    public function withFieldValue(string $fieldValue): self
    {
        $obj = clone $this;
        $obj['fieldValue'] = $fieldValue;

        return $obj;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj['recordType'] = $recordType;

        return $obj;
    }

    /**
     * Identifies the requirement type that meets this requirement.
     */
    public function withRequirementTypeID(string $requirementTypeID): self
    {
        $obj = clone $this;
        $obj['requirementTypeID'] = $requirementTypeID;

        return $obj;
    }
}
