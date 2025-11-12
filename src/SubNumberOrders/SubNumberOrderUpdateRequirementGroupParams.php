<?php

declare(strict_types=1);

namespace Telnyx\SubNumberOrders;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Update requirement group for a sub number order.
 *
 * @see Telnyx\Services\SubNumberOrdersService::updateRequirementGroup()
 *
 * @phpstan-type SubNumberOrderUpdateRequirementGroupParamsShape = array{
 *   requirement_group_id: string
 * }
 */
final class SubNumberOrderUpdateRequirementGroupParams implements BaseModel
{
    /** @use SdkModel<SubNumberOrderUpdateRequirementGroupParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The ID of the requirement group to associate.
     */
    #[Api]
    public string $requirement_group_id;

    /**
     * `new SubNumberOrderUpdateRequirementGroupParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SubNumberOrderUpdateRequirementGroupParams::with(requirement_group_id: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SubNumberOrderUpdateRequirementGroupParams)->withRequirementGroupID(...)
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
    public static function with(string $requirement_group_id): self
    {
        $obj = new self;

        $obj->requirement_group_id = $requirement_group_id;

        return $obj;
    }

    /**
     * The ID of the requirement group to associate.
     */
    public function withRequirementGroupID(string $requirementGroupID): self
    {
        $obj = clone $this;
        $obj->requirement_group_id = $requirementGroupID;

        return $obj;
    }
}
