<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\PortingOrderUpdateParams;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Specifies a value for a requirement on the Porting Order.
 *
 * @phpstan-type RequirementShape = array{
 *   field_value: string, requirement_type_id: string
 * }
 */
final class Requirement implements BaseModel
{
    /** @use SdkModel<RequirementShape> */
    use SdkModel;

    /**
     * identifies the document or provides the text value that satisfies this requirement.
     */
    #[Required]
    public string $field_value;

    /**
     * Identifies the requirement type that the `field_value` fulfills.
     */
    #[Required]
    public string $requirement_type_id;

    /**
     * `new Requirement()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Requirement::with(field_value: ..., requirement_type_id: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Requirement)->withFieldValue(...)->withRequirementTypeID(...)
     * ```
     */
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
        string $field_value,
        string $requirement_type_id
    ): self {
        $obj = new self;

        $obj['field_value'] = $field_value;
        $obj['requirement_type_id'] = $requirement_type_id;

        return $obj;
    }

    /**
     * identifies the document or provides the text value that satisfies this requirement.
     */
    public function withFieldValue(string $fieldValue): self
    {
        $obj = clone $this;
        $obj['field_value'] = $fieldValue;

        return $obj;
    }

    /**
     * Identifies the requirement type that the `field_value` fulfills.
     */
    public function withRequirementTypeID(string $requirementTypeID): self
    {
        $obj = clone $this;
        $obj['requirement_type_id'] = $requirementTypeID;

        return $obj;
    }
}
