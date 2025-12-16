<?php

declare(strict_types=1);

namespace Telnyx;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\SubNumberOrderRegulatoryRequirementWithValue\FieldType;

/**
 * @phpstan-type SubNumberOrderRegulatoryRequirementWithValueShape = array{
 *   fieldType?: null|FieldType|value-of<FieldType>,
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
        $self = new self;

        null !== $fieldType && $self['fieldType'] = $fieldType;
        null !== $fieldValue && $self['fieldValue'] = $fieldValue;
        null !== $recordType && $self['recordType'] = $recordType;
        null !== $requirementID && $self['requirementID'] = $requirementID;

        return $self;
    }

    /**
     * @param FieldType|value-of<FieldType> $fieldType
     */
    public function withFieldType(FieldType|string $fieldType): self
    {
        $self = clone $this;
        $self['fieldType'] = $fieldType;

        return $self;
    }

    /**
     * The value of the requirement, this could be an id to a resource or a string value.
     */
    public function withFieldValue(string $fieldValue): self
    {
        $self = clone $this;
        $self['fieldValue'] = $fieldValue;

        return $self;
    }

    public function withRecordType(string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }

    /**
     * Unique id for a requirement.
     */
    public function withRequirementID(string $requirementID): self
    {
        $self = clone $this;
        $self['requirementID'] = $requirementID;

        return $self;
    }
}
