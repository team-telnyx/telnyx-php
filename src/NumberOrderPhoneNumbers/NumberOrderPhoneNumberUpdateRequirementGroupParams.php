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
 *   requirementGroupID: string
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
    #[Required('requirement_group_id')]
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
        $self = new self;

        $self['requirementGroupID'] = $requirementGroupID;

        return $self;
    }

    /**
     * The ID of the requirement group to associate.
     */
    public function withRequirementGroupID(string $requirementGroupID): self
    {
        $self = clone $this;
        $self['requirementGroupID'] = $requirementGroupID;

        return $self;
    }
}
