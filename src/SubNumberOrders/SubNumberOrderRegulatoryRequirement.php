<?php

declare(strict_types=1);

namespace Telnyx\SubNumberOrders;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\SubNumberOrders\SubNumberOrderRegulatoryRequirement\FieldType;

/**
 * @phpstan-type SubNumberOrderRegulatoryRequirementShape = array{
 *   field_type?: value-of<FieldType>|null,
 *   record_type?: string|null,
 *   requirement_id?: string|null,
 * }
 */
final class SubNumberOrderRegulatoryRequirement implements BaseModel
{
    /** @use SdkModel<SubNumberOrderRegulatoryRequirementShape> */
    use SdkModel;

    /** @var value-of<FieldType>|null $field_type */
    #[Optional(enum: FieldType::class)]
    public ?string $field_type;

    #[Optional]
    public ?string $record_type;

    /**
     * Unique id for a requirement.
     */
    #[Optional]
    public ?string $requirement_id;

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
        ?string $record_type = null,
        ?string $requirement_id = null,
    ): self {
        $obj = new self;

        null !== $field_type && $obj['field_type'] = $field_type;
        null !== $record_type && $obj['record_type'] = $record_type;
        null !== $requirement_id && $obj['requirement_id'] = $requirement_id;

        return $obj;
    }

    /**
     * @param FieldType|value-of<FieldType> $fieldType
     */
    public function withFieldType(FieldType|string $fieldType): self
    {
        $obj = clone $this;
        $obj['field_type'] = $fieldType;

        return $obj;
    }

    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj['record_type'] = $recordType;

        return $obj;
    }

    /**
     * Unique id for a requirement.
     */
    public function withRequirementID(string $requirementID): self
    {
        $obj = clone $this;
        $obj['requirement_id'] = $requirementID;

        return $obj;
    }
}
