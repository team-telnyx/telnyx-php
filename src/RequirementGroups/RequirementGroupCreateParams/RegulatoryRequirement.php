<?php

declare(strict_types=1);

namespace Telnyx\RequirementGroups\RequirementGroupCreateParams;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type regulatory_requirement = array{
 *   fieldValue?: string, requirementID?: string
 * }
 */
final class RegulatoryRequirement implements BaseModel
{
    /** @use SdkModel<regulatory_requirement> */
    use SdkModel;

    #[Api('field_value', optional: true)]
    public ?string $fieldValue;

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
}
