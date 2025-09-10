<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\ActionRequirements;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PortingOrders\ActionRequirements\ActionRequirementInitiateParams\Params;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new ActionRequirementInitiateParams); // set properties as needed
 * $client->portingOrders.actionRequirements->initiate(...$params->toArray());
 * ```
 * Initiates a specific action requirement for a porting order.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->portingOrders.actionRequirements->initiate(...$params->toArray());`
 *
 * @see Telnyx\PortingOrders\ActionRequirements->initiate
 *
 * @phpstan-type action_requirement_initiate_params = array{
 *   portingOrderID: string, params: Params
 * }
 */
final class ActionRequirementInitiateParams implements BaseModel
{
    /** @use SdkModel<action_requirement_initiate_params> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $portingOrderID;

    /**
     * Required information for initiating the action requirement for AU ID verification.
     */
    #[Api]
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
     */
    public static function with(string $portingOrderID, Params $params): self
    {
        $obj = new self;

        $obj->portingOrderID = $portingOrderID;
        $obj->params = $params;

        return $obj;
    }

    public function withPortingOrderID(string $portingOrderID): self
    {
        $obj = clone $this;
        $obj->portingOrderID = $portingOrderID;

        return $obj;
    }

    /**
     * Required information for initiating the action requirement for AU ID verification.
     */
    public function withParams(Params $params): self
    {
        $obj = clone $this;
        $obj->params = $params;

        return $obj;
    }
}
