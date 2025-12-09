<?php

declare(strict_types=1);

namespace Telnyx\SubNumberOrders\SubNumberOrderUpdateRequirementGroupResponse\Data;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type RegulatoryRequirementShape = array{
 *   fieldType?: string|null, recordType?: string|null, requirementID?: string|null
 * }
 */
final class RegulatoryRequirement implements BaseModel
{
    /** @use SdkModel<RegulatoryRequirementShape> */
    use SdkModel;

    #[Optional('field_type')]
    public ?string $fieldType;

    #[Optional('record_type')]
    public ?string $recordType;

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
        ?string $fieldType = null,
        ?string $recordType = null,
        ?string $requirementID = null,
    ): self {
        $self = new self;

        null !== $fieldType && $self['fieldType'] = $fieldType;
        null !== $recordType && $self['recordType'] = $recordType;
        null !== $requirementID && $self['requirementID'] = $requirementID;

        return $self;
    }

    public function withFieldType(string $fieldType): self
    {
        $self = clone $this;
        $self['fieldType'] = $fieldType;

        return $self;
    }

    public function withRecordType(string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }

    public function withRequirementID(string $requirementID): self
    {
        $self = clone $this;
        $self['requirementID'] = $requirementID;

        return $self;
    }
}
