<?php

declare(strict_types=1);

namespace Telnyx;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\SubNumberOrderRegulatoryRequirementWithValue\FieldType;

/**
 * @phpstan-type SubNumberOrderRegulatoryRequirementWithValueShape = array{
 *   fieldType?: value-of<FieldType>|null,
 *   fieldValue?: string|null,
 *   recordType?: string|null,
 *   requirementID?: string|null,
 * }
 */
final class SubNumberOrderRegulatoryRequirementWithValue implements BaseModel
{
    /** @use SdkModel<SubNumberOrderRegulatoryRequirementWithValueShape> */
    use SdkModel;

    /** @var value-of<FieldType>|null $fieldType */
    #[Optional('field_type', enum: FieldType::class)]
    public ?string $fieldType;

    /**
     * The value of the requirement, this could be an id to a resource or a string value.
     */
    #[Optional('field_value')]
    public ?string $fieldValue;

    #[Optional('record_type')]
    public ?string $recordType;

    /**
     * Unique id for a requirement.
     */
    #[Optional('requirement_id')]
    public ?string $requirementID;

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
        ?string $requirementID = null,
    ): self {
        $obj = new self;

        null !== $fieldType && $obj['fieldType'] = $fieldType;
        null !== $fieldValue && $obj['fieldValue'] = $fieldValue;
        null !== $recordType && $obj['recordType'] = $recordType;
        null !== $requirementID && $obj['requirementID'] = $requirementID;

        return $obj;
    }

    /**
     * @param FieldType|value-of<FieldType> $fieldType
     */
    public function withFieldType(FieldType|string $fieldType): self
    {
        $obj = clone $this;
        $obj['fieldType'] = $fieldType;

        return $obj;
    }

    /**
     * The value of the requirement, this could be an id to a resource or a string value.
     */
    public function withFieldValue(string $fieldValue): self
    {
        $obj = clone $this;
        $obj['fieldValue'] = $fieldValue;

        return $obj;
    }

    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj['recordType'] = $recordType;

        return $obj;
    }

    /**
     * Unique id for a requirement.
     */
    public function withRequirementID(string $requirementID): self
    {
        $obj = clone $this;
        $obj['requirementID'] = $requirementID;

        return $obj;
    }
}
