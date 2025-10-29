<?php

declare(strict_types=1);

namespace Telnyx\RequirementGroups\RequirementGroupUpdateParams;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type RegulatoryRequirementShape = array{
 *   fieldValue?: string, requirementID?: string
 * }
 */
final class RegulatoryRequirement implements BaseModel
{
    /** @use SdkModel<RegulatoryRequirementShape> */
    use SdkModel;

    /**
     * New value for the regulatory requirement.
     */
    #[Api('field_value', optional: true)]
    public ?string $fieldValue;

    /**
     * Unique identifier for the regulatory requirement.
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
     */
    public static function with(
        ?string $fieldValue = null,
        ?string $requirementID = null
    ): self {
        $obj = new self;

        null !== $fieldValue && $obj->fieldValue = $fieldValue;
        null !== $requirementID && $obj->requirementID = $requirementID;

        return $obj;
    }

    /**
     * New value for the regulatory requirement.
     */
    public function withFieldValue(string $fieldValue): self
    {
        $obj = clone $this;
        $obj->fieldValue = $fieldValue;

        return $obj;
    }

    /**
     * Unique identifier for the regulatory requirement.
     */
    public function withRequirementID(string $requirementID): self
    {
        $obj = clone $this;
        $obj->requirementID = $requirementID;

        return $obj;
    }
}
