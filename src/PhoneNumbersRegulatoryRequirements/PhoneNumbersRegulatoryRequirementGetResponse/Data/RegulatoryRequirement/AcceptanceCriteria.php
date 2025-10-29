<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbersRegulatoryRequirements\PhoneNumbersRegulatoryRequirementGetResponse\Data\RegulatoryRequirement;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type AcceptanceCriteriaShape = array{
 *   fieldType?: string, fieldValue?: string, localityLimit?: string
 * }
 */
final class AcceptanceCriteria implements BaseModel
{
    /** @use SdkModel<AcceptanceCriteriaShape> */
    use SdkModel;

    #[Api('field_type', optional: true)]
    public ?string $fieldType;

    #[Api('field_value', optional: true)]
    public ?string $fieldValue;

    #[Api('locality_limit', optional: true)]
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
        $obj = new self;

        null !== $fieldType && $obj->fieldType = $fieldType;
        null !== $fieldValue && $obj->fieldValue = $fieldValue;
        null !== $localityLimit && $obj->localityLimit = $localityLimit;

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

    public function withLocalityLimit(string $localityLimit): self
    {
        $obj = clone $this;
        $obj->localityLimit = $localityLimit;

        return $obj;
    }
}
