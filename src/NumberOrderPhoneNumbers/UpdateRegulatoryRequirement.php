<?php

declare(strict_types=1);

namespace Telnyx\NumberOrderPhoneNumbers;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type UpdateRegulatoryRequirementShape = array{
 *   fieldValue?: string, requirementID?: string
 * }
 */
final class UpdateRegulatoryRequirement implements BaseModel
{
    /** @use SdkModel<UpdateRegulatoryRequirementShape> */
    use SdkModel;

    /**
     * The value of the requirement. For address and document requirements, this should be the ID of the resource. For textual, this should be the value of the requirement.
     */
    #[Api('field_value', optional: true)]
    public ?string $fieldValue;

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
     * The value of the requirement. For address and document requirements, this should be the ID of the resource. For textual, this should be the value of the requirement.
     */
    public function withFieldValue(string $fieldValue): self
    {
        $obj = clone $this;
        $obj->fieldValue = $fieldValue;

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
