<?php

declare(strict_types=1);

namespace Telnyx\NumberOrderPhoneNumbers;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Update requirement group for a phone number order.
 *
 * @see Telnyx\NumberOrderPhoneNumbers->updateRequirementGroup
 *
 * @phpstan-type number_order_phone_number_update_requirement_group_params = array{
 *   requirementGroupID: string
 * }
 */
final class NumberOrderPhoneNumberUpdateRequirementGroupParams implements BaseModel
{
    /** @use SdkModel<number_order_phone_number_update_requirement_group_params> */
    use SdkModel;
    use SdkParams;

    /**
     * The ID of the requirement group to associate.
     */
    #[Api('requirement_group_id')]
    public string $requirementGroupID;

    /**
     * `new NumberOrderPhoneNumberUpdateRequirementGroupParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * NumberOrderPhoneNumberUpdateRequirementGroupParams::with(
     *   requirementGroupID: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new NumberOrderPhoneNumberUpdateRequirementGroupParams)
     *   ->withRequirementGroupID(...)
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
