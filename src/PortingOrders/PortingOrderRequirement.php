<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PortingOrders\PortingOrderRequirement\FieldType;

/**
 * @phpstan-type PortingOrderRequirementShape = array{
 *   fieldType?: null|FieldType|value-of<FieldType>,
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
     * @param FieldType|value-of<FieldType>|null $fieldType
     */
    public static function with(
        FieldType|string|null $fieldType = null,
        ?string $fieldValue = null,
        ?string $recordType = null,
        ?string $requirementTypeID = null,
    ): self {
        $self = new self;

        null !== $fieldType && $self['fieldType'] = $fieldType;
        null !== $fieldValue && $self['fieldValue'] = $fieldValue;
        null !== $recordType && $self['recordType'] = $recordType;
        null !== $requirementTypeID && $self['requirementTypeID'] = $requirementTypeID;

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
     * identifies the document that satisfies this requirement.
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
     * Identifies the requirement type that meets this requirement.
     */
    public function withRequirementTypeID(string $requirementTypeID): self
    {
        $self = clone $this;
        $self['requirementTypeID'] = $requirementTypeID;

        return $self;
    }
}
