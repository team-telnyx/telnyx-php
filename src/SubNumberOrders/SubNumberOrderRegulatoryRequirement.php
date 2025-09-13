<?php

declare(strict_types=1);

namespace Telnyx\SubNumberOrders;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\SubNumberOrders\SubNumberOrderRegulatoryRequirement\FieldType;

/**
 * @phpstan-type sub_number_order_regulatory_requirement = array{
 *   fieldType?: value-of<FieldType>, recordType?: string, requirementID?: string
 * }
 */
final class SubNumberOrderRegulatoryRequirement implements BaseModel
{
    /** @use SdkModel<sub_number_order_regulatory_requirement> */
    use SdkModel;

    /** @var value-of<FieldType>|null $fieldType */
    #[Api('field_type', enum: FieldType::class, optional: true)]
    public ?string $fieldType;

    #[Api('record_type', optional: true)]
    public ?string $recordType;

    /**
     * Unique id for a requirement.
     */
    #[Api('requirement_id', optional: true)]
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
        ?string $recordType = null,
        ?string $requirementID = null,
    ): self {
        $obj = new self;

        null !== $fieldType && $obj->fieldType = $fieldType instanceof FieldType ? $fieldType->value : $fieldType;
        null !== $recordType && $obj->recordType = $recordType;
        null !== $requirementID && $obj->requirementID = $requirementID;

        return $obj;
    }

    /**
     * @param FieldType|value-of<FieldType> $fieldType
     */
    public function withFieldType(FieldType|string $fieldType): self
    {
        $obj = clone $this;
        $obj->fieldType = $fieldType instanceof FieldType ? $fieldType->value : $fieldType;

        return $obj;
    }

    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj->recordType = $recordType;

        return $obj;
    }

    /**
     * Unique id for a requirement.
     */
    public function withRequirementID(string $requirementID): self
    {
        $obj = clone $this;
        $obj->requirementID = $requirementID;

        return $obj;
    }
}
