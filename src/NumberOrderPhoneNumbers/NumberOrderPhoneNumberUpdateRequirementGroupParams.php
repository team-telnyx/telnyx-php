<?php

declare(strict_types=1);

namespace Telnyx\NumberOrderPhoneNumbers;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Update requirement group for a phone number order.
 *
 * @see Telnyx\Services\NumberOrderPhoneNumbersService::updateRequirementGroup()
 *
 * @phpstan-type NumberOrderPhoneNumberUpdateRequirementGroupParamsShape = array{
 *   requirement_group_id: string
 * }
 */
final class NumberOrderPhoneNumberUpdateRequirementGroupParams implements BaseModel
{
    /** @use SdkModel<NumberOrderPhoneNumberUpdateRequirementGroupParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The ID of the requirement group to associate.
     */
    #[Required]
    public string $requirement_group_id;

    /**
     * `new NumberOrderPhoneNumberUpdateRequirementGroupParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * NumberOrderPhoneNumberUpdateRequirementGroupParams::with(
     *   requirement_group_id: ...
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
    public static function with(string $requirement_group_id): self
    {
        $obj = new self;

        $obj['requirement_group_id'] = $requirement_group_id;

        return $obj;
    }

    /**
     * The ID of the requirement group to associate.
     */
    public function withRequirementGroupID(string $requirementGroupID): self
    {
        $obj = clone $this;
        $obj['requirement_group_id'] = $requirementGroupID;

        return $obj;
    }
}
