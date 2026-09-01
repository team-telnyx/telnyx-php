<?php

declare(strict_types=1);

namespace Telnyx\ExternalRequirements\SubNumberOrders;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\ExternalRequirements\SubNumberOrders\SubNumberOrderUpdateParams\Requirement;

/**
 * Submits the end user's details to the external verification provider and returns the requirement action. Australia mobile ID verification is currently the only action requirement. It generates a unique Onfido verification link, returned in `requirement_action.value`, which you share with the end user. The end user's `first_name` and `last_name` must be nested inside a `requirement` object; sending them at the top level is rejected.
 *
 * @see Telnyx\Services\ExternalRequirements\SubNumberOrdersService::update()
 *
 * @phpstan-import-type RequirementShape from \Telnyx\ExternalRequirements\SubNumberOrders\SubNumberOrderUpdateParams\Requirement
 *
 * @phpstan-type SubNumberOrderUpdateParamsShape = array{
 *   regulatoryRequirementID: string, requirement: Requirement|RequirementShape
 * }
 */
final class SubNumberOrderUpdateParams implements BaseModel
{
    /** @use SdkModel<SubNumberOrderUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $regulatoryRequirementID;

    /**
     * The end user's identity details for the action requirement. Australia mobile ID verification is currently the only action requirement. It requires `first_name` and `last_name`, the same fields the corresponding GET lists in `fields_required`.
     */
    #[Required]
    public Requirement $requirement;

    /**
     * `new SubNumberOrderUpdateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SubNumberOrderUpdateParams::with(regulatoryRequirementID: ..., requirement: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SubNumberOrderUpdateParams)
     *   ->withRegulatoryRequirementID(...)
     *   ->withRequirement(...)
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
     *
     * @param Requirement|RequirementShape $requirement
     */
    public static function with(
        string $regulatoryRequirementID,
        Requirement|array $requirement
    ): self {
        $self = new self;

        $self['regulatoryRequirementID'] = $regulatoryRequirementID;
        $self['requirement'] = $requirement;

        return $self;
    }

    public function withRegulatoryRequirementID(
        string $regulatoryRequirementID
    ): self {
        $self = clone $this;
        $self['regulatoryRequirementID'] = $regulatoryRequirementID;

        return $self;
    }

    /**
     * The end user's identity details for the action requirement. Australia mobile ID verification is currently the only action requirement. It requires `first_name` and `last_name`, the same fields the corresponding GET lists in `fields_required`.
     *
     * @param Requirement|RequirementShape $requirement
     */
    public function withRequirement(Requirement|array $requirement): self
    {
        $self = clone $this;
        $self['requirement'] = $requirement;

        return $self;
    }
}
