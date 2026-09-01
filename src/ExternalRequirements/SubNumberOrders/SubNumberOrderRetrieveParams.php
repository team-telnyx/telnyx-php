<?php

declare(strict_types=1);

namespace Telnyx\ExternalRequirements\SubNumberOrders;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Returns the input fields an action requirement needs and the current requirement action for a sub number order. Action requirements are fulfilled by an external step rather than by uploading documents. Australia mobile ID verification is currently the only action requirement. Once a verification link has been generated, it is returned in `requirement_action.value`.
 *
 * @see Telnyx\Services\ExternalRequirements\SubNumberOrdersService::retrieve()
 *
 * @phpstan-type SubNumberOrderRetrieveParamsShape = array{
 *   regulatoryRequirementID: string
 * }
 */
final class SubNumberOrderRetrieveParams implements BaseModel
{
    /** @use SdkModel<SubNumberOrderRetrieveParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $regulatoryRequirementID;

    /**
     * `new SubNumberOrderRetrieveParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SubNumberOrderRetrieveParams::with(regulatoryRequirementID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SubNumberOrderRetrieveParams)->withRegulatoryRequirementID(...)
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
    public static function with(string $regulatoryRequirementID): self
    {
        $self = new self;

        $self['regulatoryRequirementID'] = $regulatoryRequirementID;

        return $self;
    }

    public function withRegulatoryRequirementID(
        string $regulatoryRequirementID
    ): self {
        $self = clone $this;
        $self['regulatoryRequirementID'] = $regulatoryRequirementID;

        return $self;
    }
}
