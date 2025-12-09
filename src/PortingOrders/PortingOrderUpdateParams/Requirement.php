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
 *   fieldValue: string, requirementTypeID: string
 * }
 */
final class Requirement implements BaseModel
{
    /** @use SdkModel<RequirementShape> */
    use SdkModel;

    /**
     * identifies the document or provides the text value that satisfies this requirement.
     */
    #[Required('field_value')]
    public string $fieldValue;

    /**
     * Identifies the requirement type that the `field_value` fulfills.
     */
    #[Required('requirement_type_id')]
    public string $requirementTypeID;

    /**
     * `new Requirement()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Requirement::with(fieldValue: ..., requirementTypeID: ...)
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
        string $fieldValue,
        string $requirementTypeID
    ): self {
        $obj = new self;

        $obj['fieldValue'] = $fieldValue;
        $obj['requirementTypeID'] = $requirementTypeID;

        return $obj;
    }

    /**
     * identifies the document or provides the text value that satisfies this requirement.
     */
    public function withFieldValue(string $fieldValue): self
    {
        $obj = clone $this;
        $obj['fieldValue'] = $fieldValue;

        return $obj;
    }

    /**
     * Identifies the requirement type that the `field_value` fulfills.
     */
    public function withRequirementTypeID(string $requirementTypeID): self
    {
        $obj = clone $this;
        $obj['requirementTypeID'] = $requirementTypeID;

        return $obj;
    }
}
