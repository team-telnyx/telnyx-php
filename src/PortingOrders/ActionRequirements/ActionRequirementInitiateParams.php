<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\ActionRequirements;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PortingOrders\ActionRequirements\ActionRequirementInitiateParams\Params;

/**
 * Initiates a specific action requirement for a porting order.
 *
 * @see Telnyx\STAINLESS_FIXME_PortingOrders\ActionRequirementsService::initiate()
 *
 * @phpstan-type ActionRequirementInitiateParamsShape = array{
 *   porting_order_id: string, params: Params
 * }
 */
final class ActionRequirementInitiateParams implements BaseModel
{
    /** @use SdkModel<ActionRequirementInitiateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $porting_order_id;

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
     * ActionRequirementInitiateParams::with(porting_order_id: ..., params: ...)
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
    public static function with(string $porting_order_id, Params $params): self
    {
        $obj = new self;

        $obj->porting_order_id = $porting_order_id;
        $obj->params = $params;

        return $obj;
    }

    public function withPortingOrderID(string $portingOrderID): self
    {
        $obj = clone $this;
        $obj->porting_order_id = $portingOrderID;

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
