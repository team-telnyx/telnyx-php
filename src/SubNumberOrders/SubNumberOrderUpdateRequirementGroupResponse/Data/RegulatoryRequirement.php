<?php

declare(strict_types=1);

namespace Telnyx\SubNumberOrders\SubNumberOrderUpdateRequirementGroupResponse\Data;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type RegulatoryRequirementShape = array{
 *   field_type?: string|null,
 *   record_type?: string|null,
 *   requirement_id?: string|null,
 * }
 */
final class RegulatoryRequirement implements BaseModel
{
    /** @use SdkModel<RegulatoryRequirementShape> */
    use SdkModel;

    #[Api(optional: true)]
    public ?string $field_type;

    #[Api(optional: true)]
    public ?string $record_type;

    #[Api(optional: true)]
    public ?string $requirement_id;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?string $field_type = null,
        ?string $record_type = null,
        ?string $requirement_id = null,
    ): self {
        $obj = new self;

        null !== $field_type && $obj->field_type = $field_type;
        null !== $record_type && $obj->record_type = $record_type;
        null !== $requirement_id && $obj->requirement_id = $requirement_id;

        return $obj;
    }

    public function withFieldType(string $fieldType): self
    {
        $obj = clone $this;
        $obj->field_type = $fieldType;

        return $obj;
    }

    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj->record_type = $recordType;

        return $obj;
    }

    public function withRequirementID(string $requirementID): self
    {
        $obj = clone $this;
        $obj->requirement_id = $requirementID;

        return $obj;
    }
}
