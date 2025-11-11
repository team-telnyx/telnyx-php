<?php

declare(strict_types=1);

namespace Telnyx\RequirementGroups\RequirementGroupUpdateParams;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type RegulatoryRequirementShape = array{
 *   field_value?: string|null, requirement_id?: string|null
 * }
 */
final class RegulatoryRequirement implements BaseModel
{
    /** @use SdkModel<RegulatoryRequirementShape> */
    use SdkModel;

    /**
     * New value for the regulatory requirement.
     */
    #[Api(optional: true)]
    public ?string $field_value;

    /**
     * Unique identifier for the regulatory requirement.
     */
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
        ?string $field_value = null,
        ?string $requirement_id = null
    ): self {
        $obj = new self;

        null !== $field_value && $obj->field_value = $field_value;
        null !== $requirement_id && $obj->requirement_id = $requirement_id;

        return $obj;
    }

    /**
     * New value for the regulatory requirement.
     */
    public function withFieldValue(string $fieldValue): self
    {
        $obj = clone $this;
        $obj->field_value = $fieldValue;

        return $obj;
    }

    /**
     * Unique identifier for the regulatory requirement.
     */
    public function withRequirementID(string $requirementID): self
    {
        $obj = clone $this;
        $obj->requirement_id = $requirementID;

        return $obj;
    }
}
