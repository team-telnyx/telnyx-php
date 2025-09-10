<?php

declare(strict_types=1);

namespace Telnyx\NumberOrderPhoneNumbers\NumberOrderPhoneNumberUpdateRequirementGroupResponse\Data;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type regulatory_requirement = array{
 *   fieldType?: string|null,
 *   fieldValue?: string|null,
 *   requirementID?: string|null,
 *   status?: string|null,
 * }
 */
final class RegulatoryRequirement implements BaseModel
{
    /** @use SdkModel<regulatory_requirement> */
    use SdkModel;

    #[Api('field_type', optional: true)]
    public ?string $fieldType;

    #[Api('field_value', optional: true)]
    public ?string $fieldValue;

    #[Api('requirement_id', optional: true)]
    public ?string $requirementID;

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
        ?string $fieldType = null,
        ?string $fieldValue = null,
        ?string $requirementID = null,
        ?string $status = null,
    ): self {
        $obj = new self;

        null !== $fieldType && $obj->fieldType = $fieldType;
        null !== $fieldValue && $obj->fieldValue = $fieldValue;
        null !== $requirementID && $obj->requirementID = $requirementID;
        null !== $status && $obj->status = $status;

        return $obj;
    }

    public function withFieldType(string $fieldType): self
    {
        $obj = clone $this;
        $obj->fieldType = $fieldType;

        return $obj;
    }

    public function withFieldValue(string $fieldValue): self
    {
        $obj = clone $this;
        $obj->fieldValue = $fieldValue;

        return $obj;
    }

    public function withRequirementID(string $requirementID): self
    {
        $obj = clone $this;
        $obj->requirementID = $requirementID;

        return $obj;
    }

    public function withStatus(string $status): self
    {
        $obj = clone $this;
        $obj->status = $status;

        return $obj;
    }
}
