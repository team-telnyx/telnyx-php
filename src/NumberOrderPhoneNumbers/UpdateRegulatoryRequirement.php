<?php

declare(strict_types=1);

namespace Telnyx\NumberOrderPhoneNumbers;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type UpdateRegulatoryRequirementShape = array{
 *   field_value?: string|null, requirement_id?: string|null
 * }
 */
final class UpdateRegulatoryRequirement implements BaseModel
{
    /** @use SdkModel<UpdateRegulatoryRequirementShape> */
    use SdkModel;

    /**
     * The value of the requirement. For address and document requirements, this should be the ID of the resource. For textual, this should be the value of the requirement.
     */
    #[Api(optional: true)]
    public ?string $field_value;

    /**
     * Unique id for a requirement.
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

        null !== $field_value && $obj['field_value'] = $field_value;
        null !== $requirement_id && $obj['requirement_id'] = $requirement_id;

        return $obj;
    }

    /**
     * The value of the requirement. For address and document requirements, this should be the ID of the resource. For textual, this should be the value of the requirement.
     */
    public function withFieldValue(string $fieldValue): self
    {
        $obj = clone $this;
        $obj['field_value'] = $fieldValue;

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
