<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbersRegulatoryRequirements\PhoneNumbersRegulatoryRequirementGetResponse\Data\RegulatoryRequirement;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type AcceptanceCriteriaShape = array{
 *   field_type?: string|null,
 *   field_value?: string|null,
 *   locality_limit?: string|null,
 * }
 */
final class AcceptanceCriteria implements BaseModel
{
    /** @use SdkModel<AcceptanceCriteriaShape> */
    use SdkModel;

    #[Api(optional: true)]
    public ?string $field_type;

    #[Api(optional: true)]
    public ?string $field_value;

    #[Api(optional: true)]
    public ?string $locality_limit;

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
        ?string $locality_limit = null,
    ): self {
        $obj = new self;

        null !== $field_type && $obj->field_type = $field_type;
        null !== $field_value && $obj->field_value = $field_value;
        null !== $locality_limit && $obj->locality_limit = $locality_limit;

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

    public function withLocalityLimit(string $localityLimit): self
    {
        $obj = clone $this;
        $obj->locality_limit = $localityLimit;

        return $obj;
    }
}
