<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\PortingOrderGetRequirementsResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PortingOrders\PortingOrderGetRequirementsResponse\Data\FieldType;
use Telnyx\PortingOrders\PortingOrderGetRequirementsResponse\Data\RequirementType;

/**
 * @phpstan-type DataShape = array{
 *   field_type?: value-of<FieldType>|null,
 *   field_value?: string|null,
 *   record_type?: string|null,
 *   requirement_status?: string|null,
 *   requirement_type?: RequirementType|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * Type of value expected on field_value field.
     *
     * @var value-of<FieldType>|null $field_type
     */
    #[Optional(enum: FieldType::class)]
    public ?string $field_type;

    /**
     * Identifies the document that satisfies this requirement.
     */
    #[Optional]
    public ?string $field_value;

    /**
     * Identifies the type of the resource.
     */
    #[Optional]
    public ?string $record_type;

    /**
     * Status of the requirement.
     */
    #[Optional]
    public ?string $requirement_status;

    /**
     * Identifies the requirement type that meets this requirement.
     */
    #[Optional]
    public ?RequirementType $requirement_type;

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
     * @param RequirementType|array{
     *   id?: string|null,
     *   acceptance_criteria?: array<string,mixed>|null,
     *   description?: string|null,
     *   example?: string|null,
     *   name?: string|null,
     *   type?: string|null,
     * } $requirement_type
     */
    public static function with(
        FieldType|string|null $field_type = null,
        ?string $field_value = null,
        ?string $record_type = null,
        ?string $requirement_status = null,
        RequirementType|array|null $requirement_type = null,
    ): self {
        $obj = new self;

        null !== $field_type && $obj['field_type'] = $field_type;
        null !== $field_value && $obj['field_value'] = $field_value;
        null !== $record_type && $obj['record_type'] = $record_type;
        null !== $requirement_status && $obj['requirement_status'] = $requirement_status;
        null !== $requirement_type && $obj['requirement_type'] = $requirement_type;

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
     * Identifies the document that satisfies this requirement.
     */
    public function withFieldValue(string $fieldValue): self
    {
        $obj = clone $this;
        $obj['field_value'] = $fieldValue;

        return $obj;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj['record_type'] = $recordType;

        return $obj;
    }

    /**
     * Status of the requirement.
     */
    public function withRequirementStatus(string $requirementStatus): self
    {
        $obj = clone $this;
        $obj['requirement_status'] = $requirementStatus;

        return $obj;
    }

    /**
     * Identifies the requirement type that meets this requirement.
     *
     * @param RequirementType|array{
     *   id?: string|null,
     *   acceptance_criteria?: array<string,mixed>|null,
     *   description?: string|null,
     *   example?: string|null,
     *   name?: string|null,
     *   type?: string|null,
     * } $requirementType
     */
    public function withRequirementType(
        RequirementType|array $requirementType
    ): self {
        $obj = clone $this;
        $obj['requirement_type'] = $requirementType;

        return $obj;
    }
}
