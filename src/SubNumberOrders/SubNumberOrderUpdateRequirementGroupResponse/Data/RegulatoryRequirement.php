<?php

declare(strict_types=1);

namespace Telnyx\SubNumberOrders\SubNumberOrderUpdateRequirementGroupResponse\Data;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type regulatory_requirement = array{
 *   fieldType?: string, recordType?: string, requirementID?: string
 * }
 */
final class RegulatoryRequirement implements BaseModel
{
    /** @use SdkModel<regulatory_requirement> */
    use SdkModel;

    #[Api('field_type', optional: true)]
    public ?string $fieldType;

    #[Api('record_type', optional: true)]
    public ?string $recordType;

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
     */
    public static function with(
        ?string $fieldType = null,
        ?string $recordType = null,
        ?string $requirementID = null,
    ): self {
        $obj = new self;

        null !== $fieldType && $obj->fieldType = $fieldType;
        null !== $recordType && $obj->recordType = $recordType;
        null !== $requirementID && $obj->requirementID = $requirementID;

        return $obj;
    }

    public function withFieldType(string $fieldType): self
    {
        $obj = clone $this;
        $obj->fieldType = $fieldType;

        return $obj;
    }

    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj->recordType = $recordType;

        return $obj;
    }

    public function withRequirementID(string $requirementID): self
    {
        $obj = clone $this;
        $obj->requirementID = $requirementID;

        return $obj;
    }
}
