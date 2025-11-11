<?php

declare(strict_types=1);

namespace Telnyx\NumberOrderPhoneNumbers\NumberOrderPhoneNumberUpdateRequirementGroupResponse\Data;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type RegulatoryRequirementShape = array{
 *   field_type?: string|null,
 *   field_value?: string|null,
 *   requirement_id?: string|null,
 *   status?: string|null,
 * }
 */
final class RegulatoryRequirement implements BaseModel
{
    /** @use SdkModel<RegulatoryRequirementShape> */
    use SdkModel;

    #[Api(optional: true)]
    public ?string $field_type;

    #[Api(optional: true)]
    public ?string $field_value;

    #[Api(optional: true)]
    public ?string $requirement_id;

    #[Api(optional: true)]
    public ?string $status;

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
        ?string $field_value = null,
        ?string $requirement_id = null,
        ?string $status = null,
    ): self {
        $obj = new self;

        null !== $field_type && $obj->field_type = $field_type;
        null !== $field_value && $obj->field_value = $field_value;
        null !== $requirement_id && $obj->requirement_id = $requirement_id;
        null !== $status && $obj->status = $status;

        return $obj;
    }

    public function withFieldType(string $fieldType): self
    {
        $obj = clone $this;
        $obj->field_type = $fieldType;

        return $obj;
    }

    public function withFieldValue(string $fieldValue): self
    {
        $obj = clone $this;
        $obj->field_value = $fieldValue;

        return $obj;
    }

    public function withRequirementID(string $requirementID): self
    {
        $obj = clone $this;
        $obj->requirement_id = $requirementID;

        return $obj;
    }

    public function withStatus(string $status): self
    {
        $obj = clone $this;
        $obj->status = $status;

        return $obj;
    }
}
