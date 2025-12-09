<?php

declare(strict_types=1);

namespace Telnyx\SubNumberOrders\SubNumberOrderUpdateRequirementGroupResponse\Data\PhoneNumber;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type RegulatoryRequirementShape = array{
 *   fieldType?: string|null,
 *   fieldValue?: string|null,
 *   requirementID?: string|null,
 *   status?: string|null,
 * }
 */
final class RegulatoryRequirement implements BaseModel
{
    /** @use SdkModel<RegulatoryRequirementShape> */
    use SdkModel;

    #[Optional('field_type')]
    public ?string $fieldType;

    #[Optional('field_value')]
    public ?string $fieldValue;

    #[Optional('requirement_id')]
    public ?string $requirementID;

    #[Optional]
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
        $self = new self;

        null !== $fieldType && $self['fieldType'] = $fieldType;
        null !== $fieldValue && $self['fieldValue'] = $fieldValue;
        null !== $requirementID && $self['requirementID'] = $requirementID;
        null !== $status && $self['status'] = $status;

        return $self;
    }

    public function withFieldType(string $fieldType): self
    {
        $self = clone $this;
        $self['fieldType'] = $fieldType;

        return $self;
    }

    public function withFieldValue(string $fieldValue): self
    {
        $self = clone $this;
        $self['fieldValue'] = $fieldValue;

        return $self;
    }

    public function withRequirementID(string $requirementID): self
    {
        $self = clone $this;
        $self['requirementID'] = $requirementID;

        return $self;
    }

    public function withStatus(string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }
}
