<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\ActionRequirements;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PortingOrders\ActionRequirements\ActionRequirementInitiateParams\Params;

/**
 * Initiates a specific action requirement for a porting order.
 *
 * @see Telnyx\Services\PortingOrders\ActionRequirementsService::initiate()
 *
 * @phpstan-type ActionRequirementInitiateParamsShape = array{
 *   portingOrderID: string,
 *   params: Params|array{firstName: string, lastName: string},
 * }
 */
final class ActionRequirementInitiateParams implements BaseModel
{
    /** @use SdkModel<ActionRequirementInitiateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $portingOrderID;

    /**
     * Required information for initiating the action requirement for AU ID verification.
     */
    #[Required]
    public Params $params;

    /**
     * `new ActionRequirementInitiateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ActionRequirementInitiateParams::with(portingOrderID: ..., params: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ActionRequirementInitiateParams)->withPortingOrderID(...)->withParams(...)
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
     * @param Params|array{firstName: string, lastName: string} $params
     */
    public static function with(
        string $portingOrderID,
        Params|array $params
    ): self {
        $self = new self;

        $self['portingOrderID'] = $portingOrderID;
        $self['params'] = $params;

        return $self;
    }

    public function withPortingOrderID(string $portingOrderID): self
    {
        $self = clone $this;
        $self['portingOrderID'] = $portingOrderID;

        return $self;
    }

    /**
     * Required information for initiating the action requirement for AU ID verification.
     *
     * @param Params|array{firstName: string, lastName: string} $params
     */
    public function withParams(Params|array $params): self
    {
        $self = clone $this;
        $self['params'] = $params;

        return $self;
    }
}
