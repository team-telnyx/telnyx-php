<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PortingOrders\PortingOrderRequirement\FieldType;

/**
 * @phpstan-type PortingOrderRequirementShape = array{
 *   field_type?: value-of<FieldType>|null,
 *   field_value?: string|null,
 *   record_type?: string|null,
 *   requirement_type_id?: string|null,
 * }
 */
final class PortingOrderRequirement implements BaseModel
{
    /** @use SdkModel<PortingOrderRequirementShape> */
    use SdkModel;

    /**
     * Type of value expected on field_value field.
     *
     * @var value-of<FieldType>|null $field_type
     */
    #[Api(enum: FieldType::class, optional: true)]
    public ?string $field_type;

    /**
     * identifies the document that satisfies this requirement.
     */
    #[Api(optional: true)]
    public ?string $field_value;

    /**
     * Identifies the type of the resource.
     */
    #[Api(optional: true)]
    public ?string $record_type;

    /**
     * Identifies the requirement type that meets this requirement.
     */
    #[Api(optional: true)]
    public ?string $requirement_type_id;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param FieldType|value-of<FieldType> $field_type
     */
    public static function with(
        FieldType|string|null $field_type = null,
        ?string $field_value = null,
        ?string $record_type = null,
        ?string $requirement_type_id = null,
    ): self {
        $obj = new self;

        null !== $field_type && $obj['field_type'] = $field_type;
        null !== $field_value && $obj->field_value = $field_value;
        null !== $record_type && $obj->record_type = $record_type;
        null !== $requirement_type_id && $obj->requirement_type_id = $requirement_type_id;

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
        $obj['field_type'] = $fieldType;

        return $obj;
    }

    /**
     * identifies the document that satisfies this requirement.
     */
    public function withFieldValue(string $fieldValue): self
    {
        $obj = clone $this;
        $obj->field_value = $fieldValue;

        return $obj;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj->record_type = $recordType;

        return $obj;
    }

    /**
     * Identifies the requirement type that meets this requirement.
     */
    public function withRequirementTypeID(string $requirementTypeID): self
    {
        $obj = clone $this;
        $obj->requirement_type_id = $requirementTypeID;

        return $obj;
    }
}
