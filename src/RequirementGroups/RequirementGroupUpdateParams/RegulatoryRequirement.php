<?php

declare(strict_types=1);

namespace Telnyx\RequirementGroups\RequirementGroupUpdateParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type RegulatoryRequirementShape = array{
 *   fieldValue?: string|null, requirementID?: string|null
 * }
 */
final class RegulatoryRequirement implements BaseModel
{
    /** @use SdkModel<RegulatoryRequirementShape> */
    use SdkModel;

    /**
     * New value for the regulatory requirement.
     */
    #[Optional('field_value')]
    public ?string $fieldValue;

    /**
     * Unique identifier for the regulatory requirement.
     */
    #[Optional('requirement_id')]
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
        $self = new self;

        null !== $fieldValue && $self['fieldValue'] = $fieldValue;
        null !== $requirementID && $self['requirementID'] = $requirementID;

        return $self;
    }

    /**
     * New value for the regulatory requirement.
     */
    public function withFieldValue(string $fieldValue): self
    {
        $self = clone $this;
        $self['fieldValue'] = $fieldValue;

        return $self;
    }

    /**
     * Unique identifier for the regulatory requirement.
     */
    public function withRequirementID(string $requirementID): self
    {
        $self = clone $this;
        $self['requirementID'] = $requirementID;

        return $self;
    }
}
