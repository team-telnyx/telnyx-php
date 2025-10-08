<?php

declare(strict_types=1);

namespace Telnyx\SubNumberOrders;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new SubNumberOrderUpdateRequirementGroupParams); // set properties as needed
 * $client->subNumberOrders->updateRequirementGroup(...$params->toArray());
 * ```
 * Update requirement group for a sub number order.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->subNumberOrders->updateRequirementGroup(...$params->toArray());`
 *
 * @see Telnyx\SubNumberOrders->updateRequirementGroup
 *
 * @phpstan-type sub_number_order_update_requirement_group_params = array{
 *   requirementGroupID: string
 * }
 */
final class SubNumberOrderUpdateRequirementGroupParams implements BaseModel
{
    /** @use SdkModel<sub_number_order_update_requirement_group_params> */
    use SdkModel;
    use SdkParams;

    /**
     * The ID of the requirement group to associate.
     */
    #[Api('requirement_group_id')]
    public string $requirementGroupID;

    /**
     * `new SubNumberOrderUpdateRequirementGroupParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SubNumberOrderUpdateRequirementGroupParams::with(requirementGroupID: ...)
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
    public static function with(string $requirementGroupID): self
    {
        $obj = new self;

        $obj->requirementGroupID = $requirementGroupID;

        return $obj;
    }

    /**
     * The ID of the requirement group to associate.
     */
    public function withRequirementGroupID(string $requirementGroupID): self
    {
        $obj = clone $this;
        $obj->requirementGroupID = $requirementGroupID;

        return $obj;
    }
}
