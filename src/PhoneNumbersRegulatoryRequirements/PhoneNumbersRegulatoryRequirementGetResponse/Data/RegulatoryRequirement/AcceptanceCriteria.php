<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbersRegulatoryRequirements\PhoneNumbersRegulatoryRequirementGetResponse\Data\RegulatoryRequirement;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type AcceptanceCriteriaShape = array{
 *   fieldType?: string|null, fieldValue?: string|null, localityLimit?: string|null
 * }
 */
final class AcceptanceCriteria implements BaseModel
{
    /** @use SdkModel<AcceptanceCriteriaShape> */
    use SdkModel;

    #[Optional('field_type')]
    public ?string $fieldType;

    #[Optional('field_value')]
    public ?string $fieldValue;

    #[Optional('locality_limit')]
    public ?string $localityLimit;

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
        ?string $localityLimit = null,
    ): self {
        $self = new self;

        null !== $fieldType && $self['fieldType'] = $fieldType;
        null !== $fieldValue && $self['fieldValue'] = $fieldValue;
        null !== $localityLimit && $self['localityLimit'] = $localityLimit;

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

    public function withLocalityLimit(string $localityLimit): self
    {
        $self = clone $this;
        $self['localityLimit'] = $localityLimit;

        return $self;
    }
}
